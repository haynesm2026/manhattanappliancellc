<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\view\Blocker;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Compatibility with lazy loading libraries like `lazysizes`.
 *
 * @see https://github.com/aFarkas/lazysizes
 */
class LazyLoadingLibraries {
    use UtilsProvider;
    const KNOWN_LAZY_LOADED_CLASSES = ['lazyload'];
    /**
     * Singleton instance.
     *
     * @var LazyLoadingLibraries
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
     * Check for `lazyload` class and add transform attribute.
     *
     * @param array $attributes
     */
    public function attributes($attributes) {
        if (isset($attributes['class'])) {
            $classes = \explode(' ', $attributes['class']);
            foreach (self::KNOWN_LAZY_LOADED_CLASSES as $lazyLoadClass) {
                $found = \array_search($lazyLoadClass, $classes, \true);
                if ($found !== \false) {
                    // Create transform
                    $transform = \DevOwl\RealCookieBanner\view\Blocker::transformAttribute('class');
                    $attributes[$transform] = \join(' ', $classes);
                    // Remove from our class itself
                    unset($classes[$found]);
                    if (\count($classes) > 0) {
                        $attributes['class'] = \join(' ', $classes);
                    } else {
                        unset($attributes['class']);
                    }
                    break;
                }
            }
        }
        return $attributes;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\LazyLoadingLibraries())
            : self::$me;
    }
}
