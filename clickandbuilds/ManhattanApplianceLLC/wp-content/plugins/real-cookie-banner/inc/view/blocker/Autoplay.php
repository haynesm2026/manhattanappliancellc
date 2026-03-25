<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\blockable\Blockable;
use DevOwl\RealCookieBanner\view\Blocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Set a `consent-click-original` attribute and a few other compatibilities.
 */
class Autoplay {
    use UtilsProvider;
    const HTML_TAG_IFRAME = 'iframe';
    const HTML_TAG_DIV = 'div';
    const HTML_ATTRIBUTE_SRC = 'src';
    /**
     * Some plugins are using `data-src` (e.g. Thrive Architect) to provide the iframe to the frontend.
     */
    const HTML_ATTRIBUTE_ALTERNATIVE_SRC = 'data-src';
    /**
     * Singleton instance.
     *
     * @var Autoplay
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
     * Check for `iframes` and replace with providers.
     *
     * @param array $attributes
     * @param BlockedResult $isBlocked
     * @param string $newLinkAttribute
     * @param string $linkAttribute
     * @param string $link
     */
    public function attributes($attributes, $isBlocked, $newLinkAttribute, $linkAttribute, $link) {
        $tag = $isBlocked->getTag();
        if (
            $tag === self::HTML_TAG_IFRAME &&
            \in_array($linkAttribute, [self::HTML_ATTRIBUTE_SRC, self::HTML_ATTRIBUTE_ALTERNATIVE_SRC], \true)
        ) {
            $autoplayUrl = $this->transformUrl($link);
            // Add the attribute
            if ($autoplayUrl !== null) {
                $clickAttribute = \DevOwl\RealCookieBanner\view\Blocker::transformAttribute($linkAttribute, \true);
                $attributes[$clickAttribute] = $autoplayUrl;
            }
        }
        // [Theme Comp] Themify
        if (
            $tag === 'div' &&
            $linkAttribute === 'data-url' &&
            isset($attributes['class']) &&
            \strpos($attributes['class'], 'tb_') !== \false
        ) {
            $originalClickAttributeName = 'data-auto';
            $clickAttribute = \DevOwl\RealCookieBanner\view\Blocker::transformAttribute(
                $originalClickAttributeName,
                \true
            );
            $attributes[$clickAttribute] = '1';
        }
        return $attributes;
    }
    /**
     * Transform a given YouTube / Vimeo URL to autoplay URL.
     *
     * @param string $link
     */
    protected function transformUrl($link) {
        $autoplayUrl = null;
        $host = \parse_url($link, \PHP_URL_HOST);
        if (
            \DevOwl\RealCookieBanner\Utils::endsWith($host, 'youtube.com') ||
            \DevOwl\RealCookieBanner\Utils::endsWith($host, 'dailymotion.com') ||
            \DevOwl\RealCookieBanner\Utils::endsWith($host, 'loom.com')
        ) {
            $autoplayUrl = add_query_arg('autoplay', '1', $link);
        }
        // Vimeo (https://vimeo.zendesk.com/hc/en-us/articles/115004485728-Autoplaying-and-looping-embedded-videos)
        if (\DevOwl\RealCookieBanner\Utils::endsWith($host, 'vimeo.com')) {
            $autoplayUrl = add_query_arg(['autoplay' => '1', 'loop' => '1'], $link);
        }
        return $autoplayUrl;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\Autoplay()) : self::$me;
    }
}
