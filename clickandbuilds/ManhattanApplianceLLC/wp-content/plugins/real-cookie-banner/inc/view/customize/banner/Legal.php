<?php

namespace DevOwl\RealCookieBanner\view\customize\banner;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\AbstractCustomizePanel;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\view\BannerCustomize;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Legal settings.
 */
class Legal {
    use UtilsProvider;
    const SECTION = \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN . '-legal';
    const HEADLINE_PRIVACY_POLICY = self::SECTION . '-headline-privacy-policy';
    const HEADLINE_IMPRINT = self::SECTION . '-headline-imprint';
    const SETTING = RCB_OPT_PREFIX . '-banner-legal';
    const SETTING_PRIVACY_POLICY = self::SETTING . '-privacy-policy';
    const SETTING_PRIVACY_POLICY_LABEL = self::SETTING . '-privacy-policy-label';
    const SETTING_PRIVACY_POLICY_HIDE = self::SETTING . '-privacy-policy-hide';
    const SETTING_IMPRINT = self::SETTING . '-imprint';
    const SETTING_IMPRINT_LABEL = self::SETTING . '-imprint-label';
    const SETTING_IMPRINT_HIDE = self::SETTING . '-imprint-hide';
    const DEFAULT_PRIVACY_POLICY = 0;
    const DEFAULT_PRIVACY_POLICY_HIDE = \true;
    const DEFAULT_IMPRINT = 0;
    const DEFAULT_IMPRINT_HIDE = \true;
    /**
     * Return arguments for this section.
     */
    public function args() {
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        $defaultTexts = self::getDefaultTexts();
        $disableSiteIds =
            $compLanguage->isActive() && $compLanguage->getDefaultLanguage() !== $compLanguage->getCurrentLanguage();
        $disableSiteIdsAttrs = $disableSiteIds ? ['disabled' => 'disabled', 'style' => 'display:none;'] : [];
        $disableSiteIdDescription = $disableSiteIds
            ? \sprintf(
                // translators:
                __(
                    'This option can not be changed here. Please navigate to <a href="%s" target="_blank">Settings</a>.',
                    RCB_TD
                ),
                \DevOwl\RealCookieBanner\Core::getInstance()
                    ->getConfigPage()
                    ->getUrl()
            )
            : '';
        return [
            'name' => 'legal',
            'title' => __('Legal (Privacy Policy & Imprint)', RCB_TD),
            'description' => __(
                'In order to comply with the ePrivacy Directive, it is important that the consent dialog contains a direct link to the privacy policy and the imprint (if required in your country).',
                RCB_TD
            ),
            'controls' => [
                self::HEADLINE_PRIVACY_POLICY => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('Privacy policy', RCB_TD)
                ],
                self::SETTING_PRIVACY_POLICY => [
                    'name' => 'privacyPolicy',
                    'label' => __('Page', RCB_TD),
                    'description' => $disableSiteIdDescription,
                    'type' => $disableSiteIds ? 'number' : 'dropdown-pages',
                    'input_attrs' => $disableSiteIdsAttrs,
                    'setting' => [
                        'default' => \intval(get_option('wp_page_for_privacy_policy', self::DEFAULT_PRIVACY_POLICY)),
                        'sanitize_callback' => 'absint'
                    ]
                ],
                self::SETTING_PRIVACY_POLICY_LABEL => [
                    'name' => 'privacyPolicyLabel',
                    'label' => __('Label', RCB_TD),
                    'setting' => ['default' => $defaultTexts['privacyPolicy']]
                ],
                self::SETTING_PRIVACY_POLICY_HIDE => [
                    'name' => 'privacyPolicyHide',
                    'label' => __('Show privacy policy without cookie banner', RCB_TD),
                    'description' => __(
                        'According to some data protectors, it must be ensured that the privacy policy can be viewed before accepting services.',
                        RCB_TD
                    ),
                    'type' => 'checkbox',
                    'setting' => [
                        'default' => self::DEFAULT_PRIVACY_POLICY_HIDE,
                        'sanitize_callback' => [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\AbstractCustomizePanel::class,
                            'sanitize_checkbox'
                        ]
                    ]
                ],
                self::HEADLINE_IMPRINT => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('Imprint', RCB_TD)
                ],
                self::SETTING_IMPRINT => [
                    'name' => 'imprint',
                    'description' => $disableSiteIdDescription,
                    'label' => __('Page', RCB_TD),
                    'type' => $disableSiteIds ? 'number' : 'dropdown-pages',
                    'input_attrs' => $disableSiteIdsAttrs,
                    'setting' => ['default' => self::DEFAULT_PRIVACY_POLICY, 'sanitize_callback' => 'absint']
                ],
                self::SETTING_IMPRINT_LABEL => [
                    'name' => 'imprintLabel',
                    'label' => __('Label', RCB_TD),
                    'setting' => ['default' => $defaultTexts['imprint']]
                ],
                self::SETTING_IMPRINT_HIDE => [
                    'name' => 'imprintHide',
                    'label' => __('Show imprint without cookie banner', RCB_TD),
                    'description' => __(
                        'According to some data protectors, it must be ensured that the imprint can be viewed before accepting services.',
                        RCB_TD
                    ),
                    'type' => 'checkbox',
                    'setting' => [
                        'default' => self::DEFAULT_IMPRINT_HIDE,
                        'sanitize_callback' => [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\AbstractCustomizePanel::class,
                            'sanitize_checkbox'
                        ]
                    ]
                ]
            ]
        ];
    }
    /**
     * Get default texts.
     */
    public static function getDefaultTexts() {
        $tempTd = \DevOwl\RealCookieBanner\comp\language\Hooks::getInstance()->createTemporaryTextDomain();
        $defaults = [
            'imprint' => __('Imprint', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
            'privacyPolicy' => __('Privacy policy', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED)
        ];
        $tempTd->teardown();
        return $defaults;
    }
}
