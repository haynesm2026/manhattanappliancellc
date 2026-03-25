<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Blocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block `href` attribute for special links. Usually, the blocker does not block
 * links cause they do not load external sources. But there are some special cases, e.g.
 * lightbox plugins which need a content blocker for a link.
 *
 * @see https://www.w3schools.com/tags/tag_a.asp
 */
class LinkBlocker {
    use UtilsProvider;
    const REPLACE_TAGS = ['a'];
    const REPLACE_ATTRIBUTES = ['href'];
    const REPLACE_ONLY_IF_CLASS = [
        // [Plugin Comp] https://wordpress.org/plugins/foobox-image-lightbox/
        'foobox'
    ];
    /**
     * Singleton instance.
     *
     * @var LinkBlocker
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
     * Replace the original HTML with modified links.
     *
     * @param string $html
     */
    public function replace($html) {
        $html = \DevOwl\RealCookieBanner\Utils::preg_replace_callback_recursive(
            \DevOwl\RealCookieBanner\view\Blocker::createRegexp(self::REPLACE_TAGS, self::REPLACE_ATTRIBUTES),
            [\DevOwl\RealCookieBanner\Core::getInstance()->getBlocker(), 'replaceMatcherCallback'],
            $html
        );
        return $html;
    }
    /**
     * Check if the found link has a given class and only block it if the class is present.
     *
     * @param BlockedResult $isBlocked
     * @param string $linkAttribute
     * @param string $link
     */
    public function isBlocked($isBlocked, $linkAttribute, $link) {
        if ($isBlocked->isBlocked() && \in_array($isBlocked->getTag(), self::REPLACE_TAGS, \true)) {
            $attributes = $isBlocked->getAttributes();
            $classes = \explode(' ', $attributes['class'] ?? '');
            /**
             * In some cases we need to block a link by the `href`. But Real Cookie Banner does
             * never block `a` tags cause the do not produce external server calls. So, the solution
             * is to block a link by `href` and an associated `class`. This can be useful for lightbox
             * plugins for example.
             *
             * @hook RCB/Blocker/BlockLinkByClass
             * @param {string[]} $classes
             * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
             * @param {string} $linkAttribute
             * @param {string} $link
             * @return {string[]}
             * @since 1.6.1
             */
            $replaceOnlyIfClass = apply_filters(
                'RCB/Blocker/BlockLinkByClass',
                self::REPLACE_ONLY_IF_CLASS,
                $isBlocked,
                $linkAttribute,
                $link
            );
            foreach ($classes as $class) {
                $class = \strtolower($class);
                foreach ($replaceOnlyIfClass as $value) {
                    if ($class === $value) {
                        return $isBlocked;
                    }
                }
            }
            $isBlocked->disableBlocking();
        }
        return $isBlocked;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\LinkBlocker()) : self::$me;
    }
}
