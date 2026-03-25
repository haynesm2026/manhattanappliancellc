<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\blockable\Blockable;
use DevOwl\RealCookieBanner\view\Blocker;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\CSSBlockList;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\CSSList;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\Document;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Property\Import;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Renderable;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\AtRuleSet;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\DeclarationBlock;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\RuleSet;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSString;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\RuleValueList;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\URL;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Value;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block inline `<style>`'s. This is a special use case and we need to go one step further:
 * The complete inline style is parsed to an abstract tree (AST) and all rules with an
 * URL are blocked individually.
 */
class StyleInlineBlocker {
    use UtilsProvider;
    /**
     * Inline styles are completely different than usual URL `link`s. We need to get
     * all available inline styles, scrape their content and check if it needs to blocked.
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Attributes string after `<style`
     *      $match[2] => Full inline style
     *      $match[3] => Empty or `\` if style is escaped
     *
     * @see https://regex101.com/r/lU6i7F/3
     */
    const STYLE_INLINE_REGEXP = '/<style([^>]*)>([^<]*(?:<(?![\\\\]*\\/style>)[^<]*)*)<([\\\\]*)\\/style>/mixs';
    // Also ported to `applyContentBlocker/listenOptIn.tsx`
    const HTML_ATTRIBUTE_INLINE_STYLE = 'consent-inline-style';
    const URL_QUERY_ARG_ORIGINAL_URL = 'consent-original-url';
    const EXTRACT_COMPLETE_AT_RULE_INSTEAD_OF_SINGLE_PROPERTY = ['font-face'];
    /**
     * Singleton instance.
     *
     * @var StyleInlineBlocker
     */
    private static $me = null;
    private $outputFormat = null;
    private $dummyCssUrl = null;
    private $dummyPngUrl = null;
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    private function __construct() {
        $this->outputFormat = \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat::createCompact();
        $this->dummyCssUrl = plugins_url('public/images/dummy.css', RCB_FILE);
        $this->dummyPngUrl = plugins_url('public/images/dummy.png', RCB_FILE);
    }
    /**
     * Check if a given inline style is blocked.
     *
     * @param Blockable[] $blockables
     * @param array $attributes
     * @param string $style
     * @return BlockedResult
     */
    public function isBlocked($blockables, $attributes, $style) {
        $isBlocked = new \DevOwl\RealCookieBanner\view\blocker\BlockedResult('style', $attributes, $style);
        $allowMultiple = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBlocker()
            ->isAllowMultipleBlockerResults();
        $isCSS = isset($attributes['type']) ? \strpos($attributes['type'], 'css') !== \false : \true;
        // Find all public content blockers and check URL
        if ($isCSS) {
            foreach ($blockables as $blockable) {
                // Iterate all wildcarded URLs
                foreach ($blockable->getContainsRegularExpressions() as $expression => $regex) {
                    // m: Enable multiline search
                    if (\preg_match($regex . 'm', $style)) {
                        // This link is definitely blocked by configuration
                        if (!$isBlocked->isBlocked()) {
                            $isBlocked->setBlocked([$blockable]);
                            $isBlocked->setBlockedExpressions([$expression]);
                        }
                        if ($allowMultiple) {
                            $isBlocked->addBlocked($blockable);
                            $isBlocked->addBlockedExpression($expression);
                            break;
                        } else {
                            break 2;
                        }
                    }
                }
            }
        }
        // Allow to skip content blocker by HTML attribute
        if (
            $isBlocked->isBlocked() &&
            \DevOwl\RealCookieBanner\view\blocker\SkipBlockerTag::getInstance()->isSkipped($attributes)
        ) {
            $isBlocked->disableBlocking();
        }
        /**
         * Check if a given inline style is blocked.
         *
         * @hook RCB/Blocker/InlineStyle/IsBlocked
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $style
         * @return {BlockedResult}
         */
        return apply_filters('RCB/Blocker/InlineStyle/IsBlocked', $isBlocked, $style);
    }
    /**
     * Check if a given inline CSS rule is blocked.
     *
     * @param Blockable[] $blockables
     * @param string $url
     * @param string $style
     * @return BlockedResult
     */
    public function isRuleBlocked($blockables, $url, $style) {
        $isBlocked = new \DevOwl\RealCookieBanner\view\blocker\BlockedResult('style', [], $style);
        // Find all public content blockers and check URL
        foreach ($blockables as $blockable) {
            // Iterate all wildcarded URLs
            foreach ($blockable->getContainsRegularExpressions() as $expression => $regex) {
                // m: Enable multiline search
                if (\preg_match($regex . 'm', $url)) {
                    // This link is definitely blocked by configuration
                    $isBlocked->setBlocked([$blockable]);
                    $isBlocked->setBlockedExpressions([$expression]);
                    break 2;
                }
            }
        }
        /**
         * Check if a given inline CSS rule is blocked.
         *
         * @hook RCB/Blocker/InlineStyle/Rule/IsBlocked
         * @param {BlockedResult} $isBlocked Since 3.0.0 this is an instance of `BlockedResult`
         * @param {string} $url
         * @return {BlockedResult}
         * @since 1.13.2
         */
        return apply_filters('RCB/Blocker/InlineStyle/Rule/IsBlocked', $isBlocked, $url);
    }
    /**
     * Callback for `preg_replace_callback` with the inline style regexp.
     *
     * @param mixed $m
     */
    public function replaceMatcherCallback($m) {
        list($attributes, $style) = $this->prepareMatch($m);
        $blocker = \DevOwl\RealCookieBanner\Core::getInstance()->getBlocker();
        $blockables = $blocker->getResolvedBlockables();
        $isBlocked = $this->isBlocked($blockables, $attributes, $style);
        if (!$isBlocked->isBlocked() || !empty($m[3])) {
            return $m[0];
        }
        /**
         * Determine, if the current inline style should be split into two inline styles. One inline style
         * with only CSS rules without blocked URLs and the second one with only CSS rules with blocked URLs.
         *
         * @hook RCB/Blocker/InlineStyle/Extract
         * @param {boolean} $extract
         * @param {string} $style
         * @param {array} $attributes
         * @return {boolean}
         * @since 1.13.2
         */
        $extract = apply_filters('RCB/Blocker/InlineStyle/Extract', \true, $style, $attributes);
        list($document, $extractedDocument) = $this->parse($extract, $style, $blockables);
        /**
         * An inline style got blocked. We can now modify the rules again with the help of `\Sabberworm\CSS\CSSList\Document`.
         *
         * @hook RCB/Blocker/InlineStyle/Document
         * @param {Document} $document `\Sabberworm\CSS\CSSList\Document`
         * @param {Document} $extractedDocument `\Sabberworm\CSS\CSSList\Document`
         * @param {array} $attributes
         * @param {Blockable[]} $blockables
         * @param {string} $style
         * @see https://github.com/sabberworm/PHP-CSS-Parser
         * @since 1.13.2
         */
        do_action('RCB/Blocker/InlineStyle/Document', $document, $extractedDocument, $attributes, $blockables, $style);
        if ($extractedDocument !== null) {
            $blockedStyle = $this->getConsentHtmlForDocument($extractedDocument, $attributes);
            // Return original document as we did not found any values that we needed to block
            if (!$this->hasDocumentConsentRules($blockedStyle)) {
                return $m[0];
            }
            return \sprintf('<style>%s</style>%s', $document->render(), $blockedStyle);
        } else {
            return $this->getConsentHtmlForDocument($document, $attributes);
        }
    }
    /**
     * Check if a given string has blocked CSS rules.
     *
     * @param string $document
     */
    protected function hasDocumentConsentRules($document) {
        return \strpos($document, self::URL_QUERY_ARG_ORIGINAL_URL) !== \false;
    }
    /**
     * Get the `<span` with `consent-inline-style` of a given document.
     *
     * @param Document $document
     * @param array $attributes
     */
    protected function getConsentHtmlForDocument($document, $attributes) {
        $attributes[self::HTML_ATTRIBUTE_INLINE_STYLE] = $document->render();
        $attributes[\DevOwl\RealCookieBanner\view\Blocker::HTML_ATTRIBUTE_TYPE_NAME] =
            \DevOwl\RealCookieBanner\view\Blocker::HTML_ATTRIBUTE_TYPE_VALUE;
        return \sprintf(
            '<%1$s %2$s></%1$s>',
            \DevOwl\RealCookieBanner\view\blocker\ScriptInlineBlocker::HTML_TAG_CONSENT_SCRIPT,
            \DevOwl\RealCookieBanner\Utils::htmlAttributes($attributes)
        );
    }
    /**
     * Parse a CSS and remove blocked URLs.
     *
     * @param boolean $extract
     * @param string $style
     * @param Blockable[] $blockables
     */
    protected function parse($extract, $style, $blockables) {
        // Original document (only CSS rules without blocked URLs)
        $parser = new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser($style);
        $document = $parser->parse();
        // Extracted document (only CSS rules with blocked URLs)
        if ($extract) {
            $parser = new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser($style);
            $extractedDocument = $parser->parse();
        } else {
            $extractedDocument = null;
        }
        list(
            $setUrlChanges,
            $removedFromOriginalDocument,
            $removedRuleSetsFromOriginalDocument
        ) = $this->generateLocationChangeSet($document, $blockables, $extract, $style);
        // Prepare extracted document
        if ($extractedDocument !== null) {
            $this->removeNonBlockedRulesFromDocument(
                $extractedDocument,
                $removedFromOriginalDocument,
                $removedRuleSetsFromOriginalDocument
            );
        }
        // Finally, block the URLs
        $this->applyLocationChangeSet($setUrlChanges, $extractedDocument === null ? $document : $extractedDocument);
        // Remove blanks
        $this->removeBlanksFromCSSList($document);
        $this->removeBlanksFromCSSList($extractedDocument);
        return [$document, $extractedDocument];
    }
    /**
     * Remove all non-blocked rules depending on a "removal" list.
     *
     * @param Document $document
     * @param array $removedFromOriginalDocument
     * @param RuleSet[] $removedRuleSetsFromOriginalDocument
     */
    protected function removeNonBlockedRulesFromDocument(
        $document,
        $removedFromOriginalDocument,
        $removedRuleSetsFromOriginalDocument
    ) {
        // Remove all non-blocked rules from second inline style
        foreach ($document->getAllRuleSets() as $ruleSet) {
            // Check if the complete rule can be removed
            $found = \false;
            foreach ($removedRuleSetsFromOriginalDocument as $removedRuleSet) {
                if ($this->strposValues($removedRuleSet, $ruleSet) !== \false) {
                    $found = \true;
                    break;
                }
            }
            if ($found) {
                continue;
            }
            /**
             * RuleSet
             *
             * @var RuleSet
             */
            $ruleSet = $ruleSet;
            foreach ($ruleSet->getRules() as $rule) {
                $found = \false;
                foreach ($removedFromOriginalDocument as $value) {
                    if ($this->strposValues($rule->getValue(), $value) !== \false) {
                        $found = \true;
                        break;
                    }
                }
                if (!$found) {
                    $ruleSet->removeRule($rule);
                }
            }
        }
        // Also try to remove all `@import`'s
        foreach ($document->getAllValues() as $value) {
            $found = \false;
            foreach ($removedFromOriginalDocument as $removedValue) {
                if ($this->strposValues($removedValue, $value) !== \false) {
                    $found = \true;
                    break;
                }
            }
            if (!$found) {
                $document->remove($value);
            }
        }
    }
    /**
     * `strpos` two given values from our CSS Document.
     *
     * @param Renderable $haystack The string to search in
     * @param Renderable $needle The searched string
     */
    protected function strposValues($haystack, $needle) {
        $haystackString = \is_string($haystack) ? $haystack : $haystack->render($this->outputFormat);
        $needleString = \is_string($needle) ? $needle : $needle->render($this->outputFormat);
        return \strpos($haystackString, $needleString);
    }
    /**
     * Generate a list of changed `URL`s with their new URL. It also respects rule sets which needs to be completely
     * blocked and moved to the extracted document (e.g. `@font-face`).
     *
     * @param Document $document
     * @param Blockable[] $blockables
     * @param boolean $extract
     * @param string $style
     */
    protected function generateLocationChangeSet($document, $blockables, $extract, $style) {
        $removed = [];
        $removedRuleSets = [];
        // Delay the changes to the URLs so we can correctly extract the inline script (compare values)
        $setUrlChanges = [];
        // Iterate known rule-sets which need to be completely extracted when one value inside it is blocked (e.g. `@font-face`)
        foreach ($document->getAllRuleSets() as $ruleSet) {
            if (
                $ruleSet instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\AtRuleSet &&
                \in_array($ruleSet->atRuleName(), self::EXTRACT_COMPLETE_AT_RULE_INSTEAD_OF_SINGLE_PROPERTY, \true)
            ) {
                foreach ($ruleSet->getRules() as $rule) {
                    $val = $rule->getValue();
                    if ($val !== null) {
                        /**
                         * All rule values for this rule.
                         *
                         * @var array<RuleValueList|CSSFunction|CSSString|LineName|Size|URL|string>
                         */
                        $ruleValues = [];
                        if ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\RuleValueList) {
                            $ruleValues = $val->getListComponents();
                        }
                        foreach ($ruleValues as $ruleValue) {
                            // External URLs are always objects
                            if (\is_string($ruleValue)) {
                                continue;
                            }
                            $ruleRemoved = [];
                            $ruleResult = $this->generateLocationChangeSetForSingleValue(
                                $document,
                                $ruleValue,
                                $blockables,
                                \false,
                                $style,
                                $ruleRemoved,
                                $setUrlChanges
                            );
                            if ($ruleResult) {
                                $removedRuleSets[] = $ruleSet;
                                // Special case: Extract the complete rule set
                                if ($extract) {
                                    $document->remove($ruleSet);
                                }
                            }
                        }
                    }
                }
            }
        }
        // Iterate each value in our stylesheet
        foreach ($document->getAllValues() as $val) {
            $this->generateLocationChangeSetForSingleValue(
                $document,
                $val,
                $blockables,
                $extract,
                $style,
                $removed,
                $setUrlChanges
            );
        }
        return [$setUrlChanges, $removed, $removedRuleSets];
    }
    /**
     * Generate a list of changed `URL`s with their new URL for a single value inside our parsed document.
     *
     * @param Document $document
     * @param Value $val
     * @param Blockable[] $blockables
     * @param boolean $extract
     * @param string $style
     * @param array $removed
     * @param array $setUrlChanges
     */
    protected function generateLocationChangeSetForSingleValue(
        $document,
        $val,
        $blockables,
        $extract,
        $style,
        &$removed,
        &$setUrlChanges
    ) {
        /**
         * The found URL instance.
         *
         * @var URL
         */
        $location = null;
        if ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Property\Import) {
            $location = $val->getLocation();
            $dummyUrl = $this->dummyCssUrl;
        } elseif ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\URL) {
            $location = $val;
            $dummyUrl = $this->dummyPngUrl;
        }
        if ($location !== null) {
            $url = $location->getURL()->getString();
            $isBlocked = $this->isRuleBlocked($blockables, $url, $style);
            if ($isBlocked->isBlocked()) {
                // Remove from original document
                if ($extract) {
                    foreach ($this->removeValueFromDocument($val, $document) as $remove) {
                        $removed[] = $remove;
                    }
                }
                // Adjust URL
                $setUrlChanges[] = [
                    $location,
                    new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSString(
                        $this->generateDummyUrl($isBlocked, $dummyUrl, $url)
                    )
                ];
                return \true;
            }
        }
        return \false;
    }
    /**
     * Apply blocked URLs to document.
     *
     * @param array $setUrlChanges Result of `$this::generateLocationChangeSet`
     * @param Document $document
     */
    protected function applyLocationChangeSet($setUrlChanges, $document) {
        foreach ($setUrlChanges as $change) {
            foreach ($document->getAllValues() as $value) {
                /**
                 * The found URL instance.
                 *
                 * @var URL
                 */
                $location = null;
                if ($value instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Property\Import) {
                    $location = $value->getLocation();
                } elseif ($value instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\URL) {
                    $location = $value;
                }
                if (
                    $location !== null &&
                    $location->render($this->outputFormat) === $change[0]->render($this->outputFormat)
                ) {
                    $location->setURL($change[1]);
                }
            }
        }
    }
    /**
     * Get an URL changeset for a blocked value.
     *
     * @param array $isBlocked
     * @param string $dummyUrl
     * @param string $originalUrl
     */
    protected function generateDummyUrl($isBlocked, $dummyUrl, $originalUrl) {
        $attributes = [];
        \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBlocker()
            ->applyConsentAttributes($isBlocked, $attributes);
        $attributes[self::URL_QUERY_ARG_ORIGINAL_URL] = \sprintf('%s-', \base64_encode($originalUrl));
        // add trailing `-` to avoid removal of `==`]
        return add_query_arg($attributes, $dummyUrl);
    }
    /**
     * Remove a given CSS value from a given document and return the removed elements.
     *
     * @param mixed $value
     * @param Document $document
     */
    protected function removeValueFromDocument($value, $document) {
        if ($document->remove($value)) {
            return [$value];
        } else {
            $found = [];
            foreach ($document->getAllRuleSets() as $ruleSet) {
                /**
                 * RuleSet
                 *
                 * @var RuleSet
                 */
                $ruleSet = $ruleSet;
                foreach ($ruleSet->getRules() as $rule) {
                    if ($this->strposValues($rule->getValue(), $value) !== \false) {
                        $ruleSet->removeRule($rule);
                        $found[] = $rule->getValue();
                        break;
                    }
                }
            }
            return $found;
        }
    }
    /**
     * Remove blanks from a CSS List.
     *
     * @param CSSList $oList
     * @see https://git.io/JY5er
     */
    protected function removeBlanksFromCSSList($oList) {
        if ($oList === null) {
            return;
        }
        foreach ($oList->getContents() as $oBlock) {
            if ($oBlock instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\DeclarationBlock) {
                if (empty($oBlock->getRules())) {
                    $oList->remove($oBlock);
                }
            } elseif ($oBlock instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\CSSBlockList) {
                $this->removeBlanksFromCSSList($oBlock);
                if (empty($oBlock->getContents())) {
                    $oList->remove($oBlock);
                }
            }
        }
    }
    /**
     * Prepare the result match of a style inline regexp.
     *
     * @param array $m
     */
    public function prepareMatch($m) {
        $attributes = \DevOwl\RealCookieBanner\Utils::parseHtmlAttributes($m[1]);
        $style = $m[2];
        return [$attributes, $style];
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\StyleInlineBlocker())
            : self::$me;
    }
}
