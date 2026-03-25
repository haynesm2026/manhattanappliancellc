<?php

namespace DevOwl\RealCookieBanner\view;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Localization;
use DevOwl\RealCookieBanner\settings\Blocker as SettingsBlocker;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\blockable\Blockable;
use DevOwl\RealCookieBanner\view\blockable\BlockerPostType;
use DevOwl\RealCookieBanner\view\blocker\BlockedResult;
use DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker;
use DevOwl\RealCookieBanner\view\blocker\SkipBlockerTag;
use DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker;
use DevOwl\RealCookieBanner\view\blocker\StyleInlineBlocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block common HTML tags!
 */
class Blocker {
    use UtilsProvider;
    const BUTTON_CLICKED_IDENTIFIER = 'unblock';
    const REPLACE_TAGS = [
        'script',
        'link',
        'iframe',
        \DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker::HTML_TAG_IMG
    ];
    const REPLACE_ATTRIBUTES = [
        'href',
        'data-src',
        \DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker::HTML_ATTRIBUTE_SRC,
        // [Plugin Comp] JetElements for Elementor
        'data-lazy-load'
    ];
    /**
     * `<div>` elements are expensive in Regexp cause there a lot of them, let's assume only a
     * set of attributes to get a match. For example, WP Rockets' lazy loading technology modifies
     * iFrames and YouTube embeds.
     *
     * @see https://git.io/JLQSy
     */
    const REPLACE_TAGS_DIV = ['div'];
    const REPLACE_ATTRIBUTES_DIV = [
        // [Plugin Comp] WP Rocket
        'data-src',
        'data-lazy-src',
        // [Theme Comp] FloThemes
        'data-flo-video-embed-embed-code',
        // [Plugin Comp] JetElements for Elementor
        'style',
        // [Theme Comp] Themify
        'data-url'
    ];
    /**
     * A set of HTML tags => attribute names which should always prefix with `consent-original-`.
     */
    const REPLACE_ALWAYS_ATTRIBUTES = ['iframe' => ['sandbox'], 'script' => ['type'], 'style' => ['type']];
    /**
     * In some cases we need to keep the attributes as original instead of prefix it with `consent-original-`.
     * Keep in mind, that no external data should be loaded if the attribute is set!
     */
    const KEEP_ALWAYS_ATTRIBUTES = [
        // [Theme Comp] FloThemes
        'data-flo-video-embed-embed-code'
    ];
    const KEEP_ALWAYS_ATTRIBUTES_IF_CLASS = [
        // [Plugin Comp] Ultimate Video (WP Bakery Page Builder)
        'ultv-video__play' => ['data-src'],
        // [Plugin Comp] Elementor Video Widget
        'elementor-widget-video' => ['data-settings']
    ];
    /**
     * If a given class is given, set the visual parent. This is needed for some page builder
     * and theme compatibilities.
     */
    const SET_VISUAL_PARENT_IF_CLASS = [
        // [Theme Comp] FloThemes
        'flo-video-embed__screen' => 2,
        // [Plugin Comp] Ultimate Video (WP Bakery Page Builder)
        'ultv-video__play' => 2,
        // [Plugin Comp] Elementor
        'elementor-widget' => 'children:.elementor-widget-container',
        // [Plugin Comp] Thrive Architect
        'thrv_responsive_video' => 'children:iframe'
    ];
    /**
     * If a given class of the `parentElement` is given, set the visual parent. This is needed for
     * some page builder and theme compatibilities. This is only used on client-side (see `findVisualParent`).
     */
    const SET_VISUAL_PARENT_IF_CLASS_OF_PARENT = [
        // [Plugin Comp] Divi Builder
        'et_pb_video_box' => 1,
        // [Theme Comp] Astra Theme (Gutenberg Block)
        'ast-oembed-container' => 1
    ];
    const OB_START_PLUGINS_LOADED_PRIORITY = (\PHP_INT_MAX - 1) * -1;
    /**
     * Force to output the needed computing time at the end of the page for debug purposes.
     */
    const FORCE_TIME_COMMENT_QUERY_ARG = 'rcb-calc-time';
    /**
     * Match a string of attributes to an array.
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Attribute name
     *      $match[2] => Attribute value
     *
     * @see https://regex101.com/r/yz3x6C/2/
     * @see https://developer.wordpress.org/reference/functions/get_shortcode_atts_regex/
     * @deprecated Use `Utils::parseHtmlAttributes` instead
     */
    const ATTRIBUTES_REGEXP = '/([\\w-]+)\\s*=\\s*"([^"]*)"(?:\\s|$)|([\\w-]+)\\s*=\\s*\'([^\']*)\'(?:\\s|$)|([\\w-]+)\\s*=\\s*([^\\s\'"]+)(?:\\s|$)|"([^"]*)"(?:\\s|$)|\'([^\']*)\'(?:\\s|$)|(\\S+)(?:\\s|$)/ms';
    // Also ported to `applyContentBlocker/htmlAttributes.tsx`
    const HTML_ATTRIBUTE_CAPTURE_PREFIX = 'consent-original';
    const HTML_ATTRIBUTE_CAPTURE_CLICK_PREFIX = 'consent-click-original';
    const HTML_ATTRIBUTE_CAPTURE_SUFFIX = '_';
    // Some plugins are using something like replace(/src=/) (like WP Rocket)
    const HTML_ATTRIBUTE_BLOCKER_ID = 'consent-id';
    const HTML_ATTRIBUTE_BY = 'consent-by';
    const HTML_ATTRIBUTE_COOKIE_IDS = 'consent-required';
    const HTML_ATTRIBUTE_VISUAL_PARENT = 'consent-visual-use-parent';
    const HTML_ATTRIBUTE_UNBLOCKED_TRANSACTION_COMPLETE = 'consent-transaction-complete';
    /**
     * Caching plugins compatibility e.g. WP Rocket. Adds this `type` to your
     * `script` and `style` so it gets not combined to a combine-file for example.
     */
    const HTML_ATTRIBUTE_TYPE_FOR = ['script', 'style'];
    const HTML_ATTRIBUTE_TYPE_NAME = 'type';
    const HTML_ATTRIBUTE_TYPE_VALUE = 'application/consent';
    const HTML_ATTRIBUTE_TYPE_JS = 'application/javascript';
    private $cacheBlockables = null;
    private $obStatus = \true;
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Localize available content blockers for frontend.
     */
    public function localize() {
        $output = [];
        $blockers = \DevOwl\RealCookieBanner\settings\Blocker::getInstance()->getOrdered();
        foreach ($blockers as $blocker) {
            $output[] = \array_merge(
                ['id' => $blocker->ID, 'name' => $blocker->post_title, 'description' => $blocker->post_content],
                $blocker->metas
            );
        }
        return \DevOwl\RealCookieBanner\Core::getInstance()
            ->getCompLanguage()
            ->translateArray(
                $output,
                \array_merge(
                    \DevOwl\RealCookieBanner\settings\Blocker::SYNC_OPTIONS_COPY_AND_COPY_ONCE,
                    \DevOwl\RealCookieBanner\Localization::COMMON_SKIP_KEYS
                )
            );
    }
    /**
     * Apply the content blocker attributes to the output buffer when it is enabled.
     */
    public function registerOutputBuffer() {
        if ($this->isEnabled()) {
            \ob_start([$this, 'ob_start']);
        }
    }
    /**
     * Check if a given tag, link attribute and link is blocked.
     *
     * @param Blockable[] $blockables
     * @param string $tag
     * @param string $linkAttribute
     * @param string $link
     * @param array $attributes
     * @param string $markup
     * @return BlockedResult
     */
    public function isBlocked($blockables, $tag, $linkAttribute, $link, $attributes, $markup = null) {
        $isBlocked = new \DevOwl\RealCookieBanner\view\blocker\BlockedResult($tag, $attributes, $markup);
        $allowMultiple = $this->isAllowMultipleBlockerResults();
        // Find all public content blockers and check URL
        foreach ($blockables as $blockable) {
            // Iterate all wildcard URLs
            foreach ($blockable->getRegularExpressions() as $expression => $regex) {
                if (\preg_match($regex, $link)) {
                    // This link is definitely blocked by configuration
                    if (!$isBlocked->isBlocked()) {
                        $isBlocked->setBlocked([$blockable]);
                        $isBlocked->setBlockedExpressions([$expression]);
                    }
                    if ($allowMultiple) {
                        $isBlocked->addBlocked($blockable);
                        $isBlocked->addBlockedExpression($expression);
                        break;
                    } else {
                        break 2;
                    }
                }
            }
        }
        // Allow to skip content blocker by HTML attribute
        if (
            $isBlocked->isBlocked() &&
            \DevOwl\RealCookieBanner\view\blocker\SkipBlockerTag::getInstance()->isSkipped($attributes)
        ) {
            $isBlocked->disableBlocking();
        }
        /**
         * Check if a given tag, link attribute and link is blocked.
         *
         * @hook RCB/Blocker/IsBlocked
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $linkAttribute
         * @param {string} $link
         * @return {BlockedResult}
         */
        return apply_filters('RCB/Blocker/IsBlocked', $isBlocked, $linkAttribute, $link);
    }
    /**
     * Create HTML attributes for the content blocker.
     *
     * @param BlockedResult $isBlocked
     * @param array $attributes
     */
    public function applyConsentAttributes($isBlocked, &$attributes) {
        $blocker = $isBlocked->getFirstBlocked();
        if ($blocker->hasBlockerId()) {
            $requiredIds = $blocker->getRequiredIds();
            $alreadyRequiredIds = [];
            if (isset($attributes[self::HTML_ATTRIBUTE_COOKIE_IDS])) {
                $alreadyRequiredIds = \explode(',', $attributes[self::HTML_ATTRIBUTE_COOKIE_IDS]);
            }
            $attributes[self::HTML_ATTRIBUTE_COOKIE_IDS] = \join(
                ',',
                \array_unique(\array_merge($requiredIds, $alreadyRequiredIds))
            );
            if (!isset($attributes[self::HTML_ATTRIBUTE_BY])) {
                $attributes[self::HTML_ATTRIBUTE_BY] = $blocker->getCriteria();
            }
            if (!isset($attributes[self::HTML_ATTRIBUTE_BLOCKER_ID])) {
                $attributes[self::HTML_ATTRIBUTE_BLOCKER_ID] = $blocker->getBlockerId();
            }
            return \true;
        }
        return \false;
    }
    /**
     * Event for ob_start.
     *
     * @param string $response
     */
    public function ob_start($response) {
        if (!$this->obStatus || \DevOwl\RealCookieBanner\Utils::isDownload()) {
            return $response;
        }
        $start = \microtime(\true);
        // Measure replace time
        /**
         * Block content in a given HTML string. This is a Consent API filter and can be consumed
         * by third-party plugin and theme developers. See example for usage.
         *
         * @hook Consent/Block/HTML
         * @param {string} $html
         * @return {string}
         * @example <caption>Block content of a given HTML string</caption>
         * $output = apply_filters('Consent/Block/HTML', '<iframe src="https://player.vimeo.com/..." />');
         */
        $newResponse = apply_filters('Consent/Block/HTML', $response);
        $time_elapsed_secs = \microtime(\true) - $start;
        $htmlEndComment = '<!--rcb-cb:' . \json_encode(['replace-time' => $time_elapsed_secs]) . '-->';
        return ($newResponse === null ? $response : $newResponse) .
            (isset($_GET[self::FORCE_TIME_COMMENT_QUERY_ARG]) ? $htmlEndComment : '');
    }
    /**
     * Allows to suspend the output buffer modification.
     *
     * @param boolean $status
     */
    public function setOutputBufferStatus($status) {
        $this->obStatus = $status;
        if ($status === \false) {
            // Suppress all other output buffers as they should not be handle any data here
            // phpcs:disable
            while (@\ob_get_flush()) {
            }
            // phpcs:enable
        }
    }
    /**
     * Apply content blockers to a given HTML. It also supports JSON output.
     *
     * If you want to use this functionality in your plugin, please use the filter `Consent/Block/HTML` instead!
     *
     * @param string $html
     */
    public function replace($html) {
        if (!$this->isEnabled()) {
            return $html;
        }
        $json = \DevOwl\RealCookieBanner\Utils::isJson($html);
        // Avoid JSON primitives to be replaced
        if (\is_int($json) || $json === \true || \is_float($json)) {
            return $html;
        }
        if ($json !== \false) {
            // We have now a complete JSON array, let's walk it recursively and apply content blocker
            \array_walk_recursive($json, function (&$value) {
                if (\DevOwl\RealCookieBanner\Utils::isHtml($value)) {
                    $value = $this->replaceString($value);
                }
            });
            return \json_encode($json);
        } else {
            // Usual string
            return $this->replaceString($html);
        }
    }
    /**
     * Apply content blockers to a given HTML string.
     *
     * @param string $html
     */
    protected function replaceString($html) {
        // Common HTML tags
        $html = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            self::createRegexp(self::REPLACE_TAGS, self::REPLACE_ATTRIBUTES),
            [$this, 'replaceMatcherCallback'],
            $html
        );
        // Special `div`'s
        $html = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            self::createRegexp(self::REPLACE_TAGS_DIV, self::REPLACE_ATTRIBUTES_DIV),
            [$this, 'replaceMatcherCallback'],
            $html
        );
        // Inline Scripts
        $html = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::SCRIPT_INLINE_REGEXP,
            [\DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::getInstance(), 'replaceMatcherCallback'],
            $html
        );
        // Inline Styles
        $html = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            \DevOwl\RealCookieBanner\view\blocker\StyleInlineBlocker::STYLE_INLINE_REGEXP,
            [\DevOwl\RealCookieBanner\view\blocker\StyleInlineBlocker::getInstance(), 'replaceMatcherCallback'],
            $html
        );
        // Custom Element Blocker
        foreach ($this->getResolvedBlockables() as $blockable) {
            foreach ($blockable->getSelectorSyntax() as $selectorSyntax) {
                $html = $selectorSyntax->replace($html);
            }
        }
        /**
         * Modify HTML content for content blockers. This is called directly after the core
         * content blocker has done its job for common HTML tags (iframe, scripts, ... ) and
         * inline scripts.
         *
         * @hook RCB/Blocker/HTML
         * @param {string} $html
         * @return {string}
         */
        return apply_filters('RCB/Blocker/HTML', $html);
    }
    /**
     * Callback for `preg_replace_callback` with a given `createRegexp` regexp.
     *
     * @param mixed $m
     */
    public function replaceMatcherCallback($m) {
        list($beforeLinkAttribute, $tag, $linkAttribute, $link, $afterLink, $attributes) = self::prepareMatch($m);
        // Do not modify escaped data as they appear mostly in JSON CDATA - we do not modify behavior of other plugins and themes ;-)
        if (\strpos($link, '\\') !== \false || empty(\trim($link))) {
            return $m[0];
        }
        $blockables = $this->getResolvedBlockables();
        $isBlocked = $this->isBlocked($blockables, $tag, $linkAttribute, $link, $attributes, $m[0]);
        if (!$isBlocked->isBlocked()) {
            return $m[0];
        }
        // Prepare new attributes
        $result = $this->applyCommonAttributes($isBlocked, $attributes, $linkAttribute, $link);
        /**
         * A tag got blocked, e. g. `iframe`. We can now modify the attributes again to add an additional attribute to
         * the blocked content. This can be especially useful if you want to block additional attributes like `srcset`.
         * Do not forget to hook into the frontend and transform the modified attributes!
         *
         * @hook RCB/Blocker/HTMLAttributes
         * @param {array} $attributes
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $newLinkAttribute
         * @param {string} $linkAttribute
         * @param {string} $link
         * @return {array}
         */
        $attributes = apply_filters(
            'RCB/Blocker/HTMLAttributes',
            $attributes,
            $isBlocked,
            $result['newLinkAttribute'],
            $linkAttribute,
            $link
        );
        return \sprintf(
            '%1$s %2$s %3$s',
            $beforeLinkAttribute,
            \DevOwl\RealCookieBanner\Utils::htmlAttributes($attributes),
            $afterLink
        );
    }
    /**
     * Apply common attributes for our blocked element:
     *
     * - Visual parent
     * - Replaced link attribute (optional)
     * - Consent attributes depending on blocked item (`consent-required`, ...)
     * - Replace always attributes
     *
     * @param BlockedResult $isBlocked
     * @param array $attributes
     * @param string $linkAttribute
     * @param string $link
     */
    public function applyCommonAttributes($isBlocked, &$attributes, $linkAttribute = null, $link = null) {
        $tag = $isBlocked->getTag();
        $this->prepareVisualParent($tag, $attributes);
        $newLinkAttribute = null;
        if ($linkAttribute !== null) {
            $newLinkAttribute = self::transformAttribute($linkAttribute);
            $this->prepareNewLinkElement($tag, $attributes, $linkAttribute, $newLinkAttribute, $link);
        }
        $this->applyConsentAttributes($isBlocked, $attributes);
        $this->replaceAlwaysAttributes($tag, $attributes);
        if (\in_array($tag, self::HTML_ATTRIBUTE_TYPE_FOR, \true)) {
            $newTypeAttribute = $this->transformAttribute(self::HTML_ATTRIBUTE_TYPE_NAME);
            $attributes[$newTypeAttribute] =
                $attributes[self::HTML_ATTRIBUTE_TYPE_NAME] ?? self::HTML_ATTRIBUTE_TYPE_JS;
            $attributes[self::HTML_ATTRIBUTE_TYPE_NAME] = self::HTML_ATTRIBUTE_TYPE_VALUE;
        }
        return ['newLinkAttribute' => $newLinkAttribute];
    }
    /**
     * Prepare visual parent depending on class.
     *
     * @param string $tag
     * @param array $attributes
     * @param string $linkAttribute
     * @param string $newLinkAttribute
     * @param string $link
     */
    protected function prepareNewLinkElement($tag, &$attributes, $linkAttribute, $newLinkAttribute, $link) {
        $keepAttributes = self::KEEP_ALWAYS_ATTRIBUTES;
        if (isset($attributes['class'])) {
            $classes = \explode(' ', $attributes['class']);
            foreach ($classes as $class) {
                $class = \strtolower($class);
                foreach (self::KEEP_ALWAYS_ATTRIBUTES_IF_CLASS as $key => $classKeepAttributes) {
                    if ($class === $key) {
                        $keepAttributes = \array_merge($keepAttributes, $classKeepAttributes);
                    }
                }
            }
        }
        /**
         * In some cases we need to keep the attributes as original instead of prefix it with `consent-original-`.
         * Keep in mind, that no external data should be loaded if the attribute is set!
         *
         * @hook RCB/Blocker/KeepAttributes
         * @param {string[]} $keepAttributes
         * @param {string} $tag
         * @param {array} $attributes
         * @param {string} $linkAttribute
         * @param {string} $link
         * @return {string[]}
         * @since 1.5.0
         */
        $keepAttributes = apply_filters(
            'RCB/Blocker/KeepAttributes',
            $keepAttributes,
            $tag,
            $attributes,
            $linkAttribute,
            $link
        );
        if (\in_array($linkAttribute, $keepAttributes, \true)) {
            $attributes[$linkAttribute] = $link;
        } else {
            $attributes[$newLinkAttribute] = $link;
        }
    }
    /**
     * Prepare visual parent depending on class.
     *
     * @param string $tag
     * @param array $attributes
     */
    protected function prepareVisualParent($tag, &$attributes) {
        // Short cancel
        if (isset($attributes[self::HTML_ATTRIBUTE_VISUAL_PARENT])) {
            return;
        }
        $useVisualParent = \false;
        if (isset($attributes['class'])) {
            $classes = \explode(' ', $attributes['class']);
            foreach ($classes as $class) {
                $class = \strtolower($class);
                foreach (self::SET_VISUAL_PARENT_IF_CLASS as $key => $visualParent) {
                    if ($class === $key) {
                        $useVisualParent = $visualParent;
                        break 2;
                    }
                }
            }
        }
        /**
         * A tag got blocked, e. g. `iframe`. We can now determine the "Visual Parent". The visual parent is the
         * closest parent where the content blocker should be placed to. The visual parent can be configured as follow:
         *
         * ```
         * false = Use original element
         * true = Use parent element
         * number = Go upwards x element (parentElement)
         * string = Go upwards until parentElement matches a selector
         * string = Starting with `children:` you can `querySelector` down to create the visual parent for a children (since 2.0.4)
         * ```
         *
         * @hook RCB/Blocker/VisualParent
         * @param {boolean|string|number} $useVisualParent
         * @param {string} $tag
         * @param {array} $attributes
         * @return {boolean|string|number}
         * @since 1.5.0
         */
        $useVisualParent = apply_filters('RCB/Blocker/VisualParent', $useVisualParent, $tag, $attributes);
        if ($useVisualParent !== \false) {
            $attributes[self::HTML_ATTRIBUTE_VISUAL_PARENT] = $useVisualParent;
        }
    }
    /**
     * Replace all known attributes which should be always replaced.
     *
     * @param string $tag
     * @param array $attributes
     */
    protected function replaceAlwaysAttributes($tag, &$attributes) {
        if (isset(self::REPLACE_ALWAYS_ATTRIBUTES[$tag])) {
            foreach (self::REPLACE_ALWAYS_ATTRIBUTES[$tag] as $attr) {
                if (isset($attributes[$attr])) {
                    $newAttrName = self::transformAttribute($attr);
                    $attributes[$newAttrName] = $attributes[$attr];
                    unset($attributes[$attr]);
                }
            }
        }
    }
    /**
     * Get all available blockables.
     *
     * @return Blockable[]
     */
    public function getResolvedBlockables() {
        if ($this->cacheBlockables !== null) {
            return $this->cacheBlockables;
        }
        $blockables = [];
        $blockers = \DevOwl\RealCookieBanner\settings\Blocker::getInstance()->getOrdered();
        foreach ($blockers as &$blocker) {
            // Ignore blockers with no connected cookies
            if (
                \count($blocker->metas[\DevOwl\RealCookieBanner\settings\Blocker::META_NAME_COOKIES]) +
                    \count($blocker->metas[\DevOwl\RealCookieBanner\settings\Blocker::META_NAME_TCF_VENDORS]) ===
                0
            ) {
                continue;
            }
            $blockables[] = new \DevOwl\RealCookieBanner\view\blockable\BlockerPostType($blocker);
        }
        /**
         * Allows you to add, modify or remove existing `Blockable` instances. For usual,
         * they get generated of published Content Blocker post types records. This allows you
         * to block for example by custom criteria (cookies, TCF vendor, ...).
         *
         * **Note**: This hook is called only once, cause the result is cached for performance reasons!
         *
         * @hook RCB/Blocker/ResolveBlockables
         * @param {Blockable[]} $blockables
         * @return {Blockable[]}
         * @since 2.6.0
         */
        $this->cacheBlockables = apply_filters('RCB/Blocker/ResolveBlockables', $blockables);
        return $blockables;
    }
    /**
     * Check if content blocker is enabled on the current request.
     */
    protected function isEnabled() {
        $isEnabled =
            \DevOwl\RealCookieBanner\Utils::isFrontend() &&
            \DevOwl\RealCookieBanner\settings\General::getInstance()->isBannerActive() &&
            \DevOwl\RealCookieBanner\settings\General::getInstance()->isBlockerActive() &&
            !\DevOwl\RealCookieBanner\Utils::isPageBuilderFrontend() &&
            !is_customize_preview();
        /**
         * Allows you to force the content blocker take action. This is especially
         * useful if you want to use the blocker functionality for custom mechanism
         * like Scanner.
         *
         * @hook RCB/Blocker/Enabled
         * @param {boolean} $isEnabled
         * @return {boolean}
         * @since 2.6.0
         */
        return apply_filters('RCB/Blocker/Enabled', $isEnabled);
    }
    /**
     * See hook `RCB/Blocker/IsBlocked/AllowMultiple`.
     *
     * @return boolean
     */
    public function isAllowMultipleBlockerResults() {
        /**
         * Check if a given tag, link attribute and link is blocked.
         *
         * @hook RCB/Blocker/IsBlocked/AllowMultiple
         * @param {boolean} $allowMultiple
         * @return {boolean}
         * @since 2.6.0
         */
        return apply_filters('RCB/Blocker/IsBlocked/AllowMultiple', \false);
    }
    /**
     * Check if a given set of HTML attributes already contains the "blocked"-attribute
     * so we can skip duplicate blockages.
     *
     * @param string[] $attributes
     */
    public static function isAlreadyBlocked($attributes) {
        return isset($attributes[self::HTML_ATTRIBUTE_BLOCKER_ID]) ||
            isset($attributes[\DevOwl\RealCookieBanner\view\blocker\StyleInlineBlocker::HTML_ATTRIBUTE_INLINE_STYLE]);
    }
    /**
     * Prepare the result match of a `createRegexp` regexp.
     *
     * @param array $m
     */
    public static function prepareMatch($m) {
        // Prepare data
        $beforeLinkAttribute = $m[1];
        $tag = $m[2];
        $linkAttribute = $m[3];
        $link = $m[5];
        $afterLink = $m[6];
        // Prepare all attributes as array (unfortunately not available from regexp due to back-reference usage...)
        $beforeLinkAttribute = \explode(' ', $beforeLinkAttribute . ' ', 2);
        $withoutClosingTagChars = \rtrim($afterLink, '/>');
        $afterLink = \substr($afterLink, (\strlen($afterLink) - \strlen($withoutClosingTagChars)) * -1);
        $attributes = \DevOwl\RealCookieBanner\Utils::parseHtmlAttributes(
            $beforeLinkAttribute[1] . ' ' . \ltrim($withoutClosingTagChars, '"\'')
        );
        $beforeLinkAttribute = $beforeLinkAttribute[0];
        return [$beforeLinkAttribute, $tag, $linkAttribute, $link, $afterLink, $attributes];
    }
    /**
     * Create regular expression to catch multiple tags and attributes.
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => All content before the link attribute
     *      $match[2] => Used tag
     *      $match[3] => Used link attribute
     *      $match[4] => Used quote for link attribute
     *      $match[5] => Link
     *      $match[6] => All content after the link
     *
     * @param string[] $searchTags
     * @param string[] $searchAttributes
     * @see https://regex101.com/r/cQ9ILs/10
     */
    public static function createRegexp($searchTags, $searchAttributes) {
        return \sprintf(
            '/(<(%s)(?:\\s[^>]*\\s|\\s))(%s)=([\\"\']??)([^\\4]*)(\\4[^>]*>)/siU',
            \join('|', $searchTags),
            \join('|', $searchAttributes)
        );
    }
    /**
     * Transform an attribute to `consent-original-%s_` attribute.
     *
     * @param string $attribute
     * @param boolean $useClickEvent Uses `consent-click-original` instead of `consent-original`
     */
    public static function transformAttribute($attribute, $useClickEvent = \false) {
        return \sprintf(
            '%s-%s-%s',
            $useClickEvent ? self::HTML_ATTRIBUTE_CAPTURE_CLICK_PREFIX : self::HTML_ATTRIBUTE_CAPTURE_PREFIX,
            $attribute,
            self::HTML_ATTRIBUTE_CAPTURE_SUFFIX
        );
    }
    /**
     * New instance.
     *
     * @codeCoverageIgnore
     */
    public static function instance() {
        return new \DevOwl\RealCookieBanner\view\Blocker();
    }
}
