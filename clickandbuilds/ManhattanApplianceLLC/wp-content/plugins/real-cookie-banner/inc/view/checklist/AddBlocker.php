<?php

namespace DevOwl\RealCookieBanner\view\checklist;

use DevOwl\RealCookieBanner\base\UtilsProvider;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Add first content blocker to website.
 */
class AddBlocker extends \DevOwl\RealCookieBanner\view\checklist\AbstractChecklistItem {
    use UtilsProvider;
    const IDENTIFIER = 'add-blocker';
    // Documented in AbstractChecklistItem
    public function isChecked() {
        return $this->getFromOption(self::IDENTIFIER);
    }
    // Documented in AbstractChecklistItem
    public function toggle($state) {
        return $this->persistStateToOption(self::IDENTIFIER, $state);
    }
    // Documented in AbstractChecklistItem
    public function getTitle() {
        return __('Create a content blocker', RCB_TD);
    }
    // Documented in AbstractChecklistItem
    public function getDescription() {
        return __(
            'For visitors who do not agree to the cookies and data processing from e. g. YouTube, it is not allowed to load YouTube videos on your website. Content blockers will automatically replace this content and ask again for the visitor\'s consent.',
            RCB_TD
        );
    }
    // Documented in AbstractChecklistItem
    public function getLink() {
        return '#/blocker/new';
    }
    // Documented in AbstractChecklistItem
    public function getLinkText() {
        return __('Add content blocker', RCB_TD);
    }
}
