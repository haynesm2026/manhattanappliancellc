<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual;

// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * PolyLang language handler.
 */
class PolyLang extends \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractSyncPlugin {
    // Documented in AbstractSyncPlugin
    public function switch($locale) {
        // PolyLang does currently only offer this method to be compatible with WPML API
        do_action('wpml_switch_language', $locale);
    }
    // Documented in AbstractSyncPlugin
    public function termCopiedToAllOtherLanguages($translations) {
        $translations = \array_merge($translations, pll_get_term_translations(\array_values($translations)[0]));
        pll_save_term_translations($translations);
    }
    // Documented in AbstractSyncPlugin
    public function postCopiedToAllOtherLanguages($translations) {
        $translations = \array_merge($translations, pll_get_post_translations(\array_values($translations)[0]));
        pll_save_post_translations($translations);
    }
    // Documented in AbstractSyncPlugin
    public function setTermLanguage($termId, $locale) {
        pll_set_term_language($termId, $locale);
    }
    // Documented in AbstractSyncPlugin
    public function setPostLanguage($postId, $locale) {
        pll_set_post_language($postId, $locale);
    }
    // Documented in AbstractLanguagePlugin
    public function getActiveLanguages() {
        return pll_languages_list();
    }
    // Documented in AbstractLanguagePlugin
    public function getTranslatedName($locale) {
        $active = $this->getActiveLanguages();
        $index = \array_search($locale, $active, \true);
        return $index === \false ? $locale : pll_languages_list(['fields' => 'name'])[$index];
    }
    // Documented in AbstractLanguagePlugin
    public function getWordPressCompatibleLanguageCode($locale) {
        $active = $this->getActiveLanguages();
        $index = \array_search($locale, $active, \true);
        return $index === \false ? $locale : pll_languages_list(['fields' => 'locale'])[$index];
    }
    // Documented in AbstractLanguagePlugin
    public function getDefaultLanguage() {
        return pll_default_language();
    }
    // Documented in AbstractLanguagePlugin
    public function getCurrentLanguage() {
        return \function_exists('pll_current_language') ? pll_current_language() : '';
    }
    // Documented in AbstractSyncPlugin
    public function getOriginalPostId($id, $post_type) {
        return pll_get_post($id, $this->getDefaultLanguage());
    }
    // Documented in AbstractSyncPlugin
    public function getCurrentPostId($id, $post_type, $locale = null) {
        $result = pll_get_post($id, $locale === null ? $this->getCurrentLanguage() : $locale);
        return empty($result) ? $id : $result;
    }
    // Documented in AbstractSyncPlugin
    public function getCurrentTermId($id, $taxonomy, $locale = null) {
        $result = pll_get_term($id, $locale === null ? $this->getCurrentLanguage() : $locale);
        return empty($result) ? $id : $result;
    }
    /**
     * Check if PolyLang is active.
     */
    public static function isPresent() {
        return is_plugin_active('polylang/polylang.php') || is_plugin_active('polylang-pro/polylang.php');
    }
}
