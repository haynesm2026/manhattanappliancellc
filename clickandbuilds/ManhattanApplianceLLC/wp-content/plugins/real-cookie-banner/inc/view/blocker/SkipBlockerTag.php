<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Do not block HTML tags with `consent-skip-blocker="1"` attribute. This is especially
 * useful for `codeOnPageLoad` scripts.
 */
class SkipBlockerTag {
    use UtilsProvider;
    const HTML_ATTRIBUTE_CONSENT_SKIP_BLOCKER = 'consent-skip-blocker';
    const HTML_ATTRIBUTE_CONSENT_SKIP_BLOCKER_VALUE = '1';
    const HTML_TRANSFORM_TAGS = ['script', 'link', 'style'];
    /**
     * Singleton instance.
     *
     * @var SkipBlockerTag
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
     * Check if given HTML attributes contain a skipper.
     *
     * @param string[] $attributes
     */
    public function isSkipped($attributes) {
        return isset($attributes[self::HTML_ATTRIBUTE_CONSENT_SKIP_BLOCKER]) &&
            $attributes[self::HTML_ATTRIBUTE_CONSENT_SKIP_BLOCKER] === self::HTML_ATTRIBUTE_CONSENT_SKIP_BLOCKER_VALUE;
    }
    /**
     * Transform a set of given tags to be skipped.
     *
     * @param string $html
     */
    public function transformTags($html) {
        return \preg_replace(
            \sprintf('/^(<(%s))/m', \join('|', self::HTML_TRANSFORM_TAGS)),
            '$1 consent-skip-blocker="1"',
            $html
        );
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\SkipBlockerTag())
            : self::$me;
    }
}
