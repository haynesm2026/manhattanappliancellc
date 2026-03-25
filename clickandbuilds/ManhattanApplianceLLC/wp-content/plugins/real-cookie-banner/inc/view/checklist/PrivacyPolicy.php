<?php

namespace DevOwl\RealCookieBanner\view\checklist;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\settings\General;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Is a privacy policy page set?
 */
class PrivacyPolicy extends \DevOwl\RealCookieBanner\view\checklist\AbstractChecklistItem {
    use UtilsProvider;
    const IDENTIFIER = 'privacy-policy';
    // Documented in AbstractChecklistItem
    public function isChecked() {
        return get_option(\DevOwl\RealCookieBanner\settings\General::SETTING_PRIVACY_POLICY_ID) > 0;
    }
    // Documented in AbstractChecklistItem
    public function getTitle() {
        return __('Set privacy policy page', RCB_TD);
    }
    // Documented in AbstractChecklistItem
    public function getLink() {
        return '#/settings';
    }
    // Documented in AbstractChecklistItem
    public function getLinkText() {
        return __('Set privacy policy page', RCB_TD);
    }
}
