<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\GoogleMapsPreset as PresetsGoogleMapsPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Maps blocker preset.
 */
class GoogleMapsPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\GoogleMapsPreset::IDENTIFIER;
    const VERSION = 4;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Google Maps';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => [
                'hosts' => [
                    '*maps.google.com*',
                    '*google.*/maps*',
                    '*maps.googleapis.com*',
                    '*maps.gstatic.com*',
                    // [Plugin Comp] https://wordpress.org/plugins/wp-google-maps/
                    'div[data-settings*="wpgmza_"]',
                    '*/wp-content/plugins/wp-google-maps/*',
                    '*/wp-content/plugins/wp-google-maps-pro/*',
                    // [Plugin Comp] https://wordpress.org/plugins/google-maps-easy/
                    'div[class="gmp_map_opts"]',
                    // [Plugin Comp] https://www.elegantthemes.com/gallery/divi/
                    'div[class="et_pb_map"]',
                    // [Plugin Comp] https://undsgn.com/uncode/
                    'div[class*="uncode-gmaps-widget"]',
                    '*uncode.gmaps*.js*',
                    // [Plugin Comp] https://www.dynamic.ooo/widget/dynamic-google-maps/
                    '*dynamic-google-maps.js*',
                    '*@googlemaps/markerclustererplus/*',
                    'div[data-widget_type*="dyncontel-acf-google-maps"]',
                    // [Plugin Comp] https://wordpress.org/plugins/wp-google-map-plugin/
                    '*/wp-content/plugins/wp-google-map-gold/assets/js/*',
                    '*/wp-content/plugins/wp-google-map-plugin/assets/js/*',
                    '.data("wpgmp_maps")',
                    'div[class*="wpgmp_map_container"]',
                    // [Plugin Comp] https://themify.me/addons/maps-pro
                    'div[data-map-provider="google"]',
                    'div[class*="module-maps-pro"]',
                    // [Plugin Comp] https://wordpress.org/plugins/wp-store-locator/
                    'div[id="wpsl-wrap"]',
                    '*/wp-content/plugins/wp-store-locator/js/*'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/google-maps.png')
        ];
    }
}
