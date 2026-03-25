<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset as PresetsFacebookPostPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook (Post) blocker preset.
 */
class FacebookPostPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset::IDENTIFIER;
    const VERSION = 2;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Facebook (Post)';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'description' => __('includes videos', RCB_TD),
            'attributes' => [
                'hosts' => [
                    '*facebook.com/plugins/post.php*',
                    '*facebook.com/plugins/video.php*',
                    '*connect.facebook.net*',
                    '*fbcdn.net*',
                    'div[class="fb-post"]'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/facebook.png')
        ];
    }
}
