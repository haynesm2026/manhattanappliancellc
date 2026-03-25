<?php

namespace DevOwl\RealCookieBanner\view\blockable;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Blocker;
use DevOwl\RealCookieBanner\view\blocker\BlockedResult;
use DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker;
use DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block a HTML element by CSS-like selectors, e.g. `div[class="my-class"]`.
 */
class SelectorSyntax {
    use UtilsProvider;
    const COMPARATOR_EXISTS = 'EXISTS';
    const COMPARATOR_EQUAL = '=';
    const COMPARATOR_CONTAINS = '*=';
    const COMPARATOR_STARTS_WITH = '^=';
    const COMPARATOR_ENDS_WITH = '$=';
    const ALLOWED_COMPARATORS = [
        self::COMPARATOR_EQUAL,
        self::COMPARATOR_CONTAINS,
        self::COMPARATOR_STARTS_WITH,
        self::COMPARATOR_ENDS_WITH
    ];
    public $expression;
    public $tag;
    public $attribute;
    public $comparator;
    public $value;
    /**
     * The blocker.
     *
     * @var Blockable
     */
    public $blockable;
    /**
     * Memory last `isBlocked` variable so we can pass it down to our filters.
     *
     * @var BlockedResult
     */
    public $isBlocked;
    /**
     * See class description.
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Tag
     *      $match[2] => Attribute
     *      $match[3] => Comparator (can be empty)
     *      $match[4] => Value (can be empty)
     *
     * @see https://regex101.com/r/vlbn3Y/2/
     */
    const CUSTOM_ELEMENT_REGEXP = '/^([A-Za-z_-]+)\\[([A-Za-z_-]+)(?:(%s)"([^"]+)")?]$/m';
    /**
     * C'tor.
     *
     * @param string $expression
     * @param string $tag
     * @param string $attribute
     * @param string $comparator
     * @param string $value
     * @param Blockable $blockable
     * @codeCoverageIgnore
     */
    private function __construct($expression, $tag, $attribute, $comparator, $value, $blockable) {
        $this->expression = $expression;
        $this->tag = $tag;
        $this->attribute = $attribute;
        $this->comparator = $comparator;
        $this->value = $value;
        $this->blockable = $blockable;
    }
    /**
     * Apply custom element blockers to a given HTML string.
     *
     * @param string $html
     */
    public function replace($html) {
        // Special case: <script>
        if ($this->tag === 'script') {
            return \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
                \str_replace(
                    'src=',
                    'NEVER_GETTING_A_HIT_KEEP_ATTRIBUTES',
                    \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::SCRIPT_INLINE_REGEXP
                ),
                [$this, 'replaceInlineScriptCallback'],
                $html
            );
        }
        return \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            \DevOwl\RealCookieBanner\view\Blocker::createRegexp([$this->tag], [$this->attribute]),
            [$this, 'replaceMatcherCallback'],
            $html
        );
    }
    /**
     * Callback for `preg_replace_callback` with a given inline scripts.
     *
     * @param mixed $m
     */
    public function replaceInlineScriptCallback($m) {
        list($attributes) = \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::getInstance()->prepareMatch($m);
        // Ignore scripts with `src` attribute as they are not treated as inline scripts
        if (
            \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::getInstance()->isNotAnInlineScript($attributes)
        ) {
            return $m[0];
        }
        // Check if our attribute exists and is set correctly
        if (!isset($attributes[$this->attribute])) {
            return $m[0];
        }
        $this->isBlocked = $this->isCompareValid($attributes[$this->attribute], $m[0]);
        if (!$this->isBlocked->isBlocked()) {
            return $m[0];
        }
        // Differ between inline scripts and non-inline-scripts
        if (isset($attributes[\DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker::HTML_ATTRIBUTE_SRC])) {
            // Force to block next match
            add_filter('RCB/Blocker/IsBlocked', [$this, 'getIsBlockedResult']);
            $result = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
                \DevOwl\RealCookieBanner\view\Blocker::createRegexp(
                    [$this->tag],
                    [\DevOwl\RealCookieBanner\view\blocker\SrcSetBlocker::HTML_ATTRIBUTE_SRC]
                ),
                [\DevOwl\RealCookieBanner\Core::getInstance()->getBlocker(), 'replaceMatcherCallback'],
                $m[0]
            );
            remove_filter('RCB/Blocker/IsBlocked', [$this, 'getIsBlockedResult']);
        } else {
            // Force to block next match
            add_filter('RCB/Blocker/InlineScript/IsBlocked', [$this, 'getIsBlockedResult']);
            $result = \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::getInstance()->replaceMatcherCallback(
                $m
            );
            remove_filter('RCB/Blocker/InlineScript/IsBlocked', [$this, 'getIsBlockedResult']);
        }
        $this->isBlocked = null;
        return $result;
    }
    /**
     * Callback for `preg_replace_callback` with a given `createRegexp` regexp.
     *
     * @param mixed $m
     */
    public function replaceMatcherCallback($m) {
        list(
            $beforeLinkAttribute,
            $tag,
            ,
            $foundValue,
            $afterLink,
            $attributes
        ) = \DevOwl\RealCookieBanner\view\Blocker::prepareMatch($m);
        $this->isBlocked = $this->isCompareValid($foundValue, $m[0]);
        if (!$this->isBlocked->isBlocked()) {
            return $m[0];
        }
        \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBlocker()
            ->applyCommonAttributes($this->getIsBlockedResult(), $attributes, $this->attribute, $foundValue);
        // Disable known loading attributes like `href` or `src`
        foreach (\DevOwl\RealCookieBanner\view\Blocker::REPLACE_ATTRIBUTES as $loadingAttr) {
            if (isset($attributes[$loadingAttr])) {
                $newAttribute = \DevOwl\RealCookieBanner\view\Blocker::transformAttribute($loadingAttr);
                $attributes[$newAttribute] = $attributes[$loadingAttr];
                unset($attributes[$loadingAttr]);
            }
        }
        $this->isBlocked = null;
        return \sprintf(
            '%1$s %2$s %3$s',
            $beforeLinkAttribute,
            \DevOwl\RealCookieBanner\Utils::htmlAttributes($attributes),
            $afterLink
        );
    }
    /**
     * Check a given value with the comparator.
     *
     * @param string $value
     * @param string $markup
     * @return BlockedResult
     */
    protected function isCompareValid($value, $markup = null) {
        $isBlocked = new \DevOwl\RealCookieBanner\view\blocker\BlockedResult($this->tag, [], $markup);
        $isBlocked->setBlocked([$this->blockable]);
        $isBlocked->setBlockedExpressions([$this->expression]);
        switch ($this->comparator) {
            case self::COMPARATOR_EXISTS:
                // No compare needed cause the regular expression already catches the element with this attribute included
                // and we do not care about the value
                break;
            case self::COMPARATOR_EQUAL:
                if ($value !== $this->value) {
                    $isBlocked->disableBlocking();
                }
                break;
            case self::COMPARATOR_CONTAINS:
                if (\strpos($value, $this->value) === \false) {
                    $isBlocked->disableBlocking();
                }
                break;
            case self::COMPARATOR_STARTS_WITH:
                if (!\DevOwl\RealCookieBanner\Utils::startsWith($value, $this->value)) {
                    $isBlocked->disableBlocking();
                }
                break;
            case self::COMPARATOR_ENDS_WITH:
                if (!\DevOwl\RealCookieBanner\Utils::endsWith($value, $this->value)) {
                    $isBlocked->disableBlocking();
                }
                break;
            default:
                $isBlocked->disableBlocking();
                break;
        }
        /**
         * Check if a element blocked by custom element blocking (Selector Syntax) is blocked.
         *
         * @hook RCB/Blocker/SelectorSyntax/IsBlocked
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {SelectorSyntax} $selector
         * @return {BlockedResult}
         * @since 2.6.0
         */
        return apply_filters('RCB/Blocker/SelectorSyntax/IsBlocked', $isBlocked, $this);
    }
    /**
     * Get the result for `RCB/Blocker/InlineScript/IsBlocked` filter for the current blockable.
     */
    public function getIsBlockedResult() {
        return $this->isBlocked;
    }
    /**
     * Create an instance if the given string is a valid expression or return `false`.
     *
     * @param string $expression
     * @param Blockable $blockable
     * @return false|SelectorSyntax
     */
    public static function probableCreateInstance($expression, $blockable) {
        $regexp = \sprintf(
            self::CUSTOM_ELEMENT_REGEXP,
            \join('|', \array_map('preg_quote', self::ALLOWED_COMPARATORS))
        );
        \preg_match($regexp, $expression, $matches);
        if (!empty($matches)) {
            return new \DevOwl\RealCookieBanner\view\blockable\SelectorSyntax(
                $matches[0],
                $matches[1],
                $matches[2],
                $matches[3] ?? self::COMPARATOR_EXISTS,
                $matches[4] ?? null,
                $blockable
            );
        }
        return \false;
    }
}
