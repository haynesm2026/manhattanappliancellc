<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\blockable\Blockable;
use DevOwl\RealCookieBanner\view\Blocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block inline `<script>`'s.
 */
class ScriptInlineBlocker {
    use UtilsProvider;
    /**
     * Inline scripts are completely different than usual URL scripts. We need to get
     * all available inline scripts, scrape their content and check if it needs to blocked.
     *
     * **Attention**: This also captures usual `script` tags, so you have to check this manually
     * via PHP if the `src` tag is given!
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Attributes string after `<script`
     *      $match[2] => Full inline script
     *
     * @see https://regex101.com/r/7lYPHA/3
     */
    const SCRIPT_INLINE_REGEXP = '/<script([^>]*)>([^<]*(?:<(?![\\\\]*\\/script>)[^<]*)*)<([\\\\]*)\\/script>/smix';
    // Also ported to `applyContentBlocker/listenOptIn.tsx`
    const HTML_ATTRIBUTE_INLINE = 'consent-inline';
    // Why an own attribute? This should avoid caching plugins cache the content of this tag
    const HTML_TAG_CONSENT_SCRIPT = 'script';
    // use span, as wp_kses is intent to remove other custom tags, and we need an inline-tag
    const SKIP_VARIABLES = ['_wpCustomizeSettings'];
    /**
     * Singleton instance.
     *
     * @var ScriptInlineBlocker
     */
    private static $me = null;
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Check if a given inline script is blocked.
     *
     * @param Blockable[] $blockables
     * @param array $attributes
     * @param string $script
     * @return BlockedResult
     */
    public function isBlocked($blockables, $attributes, $script) {
        $isBlocked = new \DevOwl\RealCookieBanner\view\blocker\BlockedResult('script', $attributes, $script);
        $allowMultiple = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBlocker()
            ->isAllowMultipleBlockerResults();
        $isJavascript = isset($attributes['type']) ? \strpos($attributes['type'], 'javascript') !== \false : \true;
        $isCdata = \DevOwl\RealCookieBanner\Utils::startsWith(\trim($script), '/' . '* <![CDATA[ */');
        $isRcbLocalized = \DevOwl\RealCookieBanner\Utils::startsWith(\trim($script), 'var realCookieBanner');
        // Find all public content blockers and check URL
        if ($isJavascript && !$isCdata && !$isRcbLocalized) {
            foreach ($blockables as $blockable) {
                // Iterate all wildcarded URLs
                foreach ($blockable->getContainsRegularExpressions() as $expression => $regex) {
                    // m: Enable multiline search
                    if (\preg_match($regex . 'm', $script)) {
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
        }
        // Allow to skip content blocker by HTML attribute
        if (
            $isBlocked->isBlocked() &&
            (\DevOwl\RealCookieBanner\view\blocker\SkipBlockerTag::getInstance()->isSkipped($attributes) ||
                $this->isLocalizedVariable($script))
        ) {
            $isBlocked->disableBlocking();
        }
        /**
         * Check if a given inline script is blocked.
         *
         * @hook RCB/Blocker/InlineScript/IsBlocked
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $script
         * @return {BlockedResult}
         */
        return apply_filters('RCB/Blocker/InlineScript/IsBlocked', $isBlocked, $script);
    }
    /**
     * Check if a given inline script is produced by `wp_localized_script` and starts with
     * something like `var xxxxx=`.
     *
     * @param string $script
     */
    protected function isLocalizedVariable($script) {
        /**
         * Check if a given inline script is blocked by a localized variable name (e.g. `wp_localize_script`).
         *
         * @hook RCB/Blocker/InlineScript/AvoidBlockByLocalizedVariable
         * @param {string[]} $variables
         * @param {string} $script
         * @return {string[]}
         * @since 1.14.1
         */
        $variables = apply_filters(
            'RCB/Blocker/InlineScript/AvoidBlockByLocalizedVariable',
            self::SKIP_VARIABLES,
            $script
        );
        $trimmedScript = \trim($script);
        foreach ($variables as $variable) {
            if (\DevOwl\RealCookieBanner\Utils::startsWith($trimmedScript, \sprintf('var %s', $variable))) {
                return \true;
            }
        }
        return \false;
    }
    /**
     * Callback for `preg_replace_callback` with the inline script regexp.
     *
     * @param mixed $m
     */
    public function replaceMatcherCallback($m) {
        list($attributes, $script) = $this->prepareMatch($m);
        // Ignore scripts with `src` attribute as they are not treated as inline scripts
        if ($this->isNotAnInlineScript($attributes)) {
            return $m[0];
        }
        $blocker = \DevOwl\RealCookieBanner\Core::getInstance()->getBlocker();
        $blockables = $blocker->getResolvedBlockables();
        $isBlocked = $this->isBlocked($blockables, $attributes, $script);
        if (!$isBlocked->isBlocked()) {
            return $m[0];
        }
        // Prepare new attributes
        $blocker->applyCommonAttributes($isBlocked, $attributes);
        $attributes[self::HTML_ATTRIBUTE_INLINE] = $script;
        /**
         * An inline script got blocked, e. g. `iframe`. We can now modify the attributes again to add an additional attribute to
         * the blocked script. Do not forget to hook into the frontend and transform the modified attributes!
         *
         * @hook RCB/Blocker/InlineScript/HTMLAttributes
         * @param {array} $attributes
         * @param {array} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $script
         * @return {array}
         */
        $attributes = apply_filters('RCB/Blocker/InlineScript/HTMLAttributes', $attributes, $isBlocked, $script);
        return \sprintf(
            '<%1$s %2$s></%1$s>',
            self::HTML_TAG_CONSENT_SCRIPT,
            \DevOwl\RealCookieBanner\Utils::htmlAttributes($attributes)
        );
    }
    /**
     * Prepare the result match of a script inline regexp.
     *
     * @param array $m
     */
    public function prepareMatch($m) {
        $attributes = \DevOwl\RealCookieBanner\Utils::parseHtmlAttributes($m[1]);
        $script = $m[2];
        return [$attributes, $script];
    }
    /**
     * Checks if the passed attributes of a found `<script` tag is not an inline script.
     *
     * @param array $attributes
     */
    public function isNotAnInlineScript($attributes) {
        return isset($attributes['src']) && !empty($attributes['src']);
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker())
            : self::$me;
    }
}
