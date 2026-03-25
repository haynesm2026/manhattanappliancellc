<?php

namespace DevOwl\RealCookieBanner\view\blocker;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Block `<link`'s with `preconnect` and `dns-prefetch`.
 */
class LinkRelBlocker {
    use UtilsProvider;
    const REL = ['preconnect', 'dns-prefetch'];
    private $expressionToRegexCache = [];
    /**
     * Singleton instance.
     *
     * @var LinkBlocker
     */
    private static $me = null;
    /**
     * Block `<link`'s with `preconnect` and `dns-prefetch`.
     *
     * @param BlockedResult $isBlocked
     * @param string $linkAttribute
     * @param string $link
     */
    public function isBlocked($isBlocked, $linkAttribute, $link) {
        $attributes = $isBlocked->getAttributes();
        $rel = $attributes['rel'] ?? null;
        if ($rel !== null && \in_array($rel, self::REL, \true)) {
            $blocker = \DevOwl\RealCookieBanner\Core::getInstance()->getBlocker();
            $blockables = $blocker->getResolvedBlockables();
            $allowMultiple = $blocker->isAllowMultipleBlockerResults();
            $this->createExpressionToRegexCache();
            // Create regex cache for hosts
            foreach ($blockables as $blockable) {
                // Iterate all wildcard URLs
                foreach ($blockable->getRegularExpressions() as $expression => $regex) {
                    $useRegex = $this->expressionToRegexCache[$expression] ?? \false;
                    if ($useRegex && \preg_match($useRegex, $link)) {
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
        return $isBlocked;
    }
    /**
     * Create an expression => regular expression cache for all available URLs in available blockables.
     */
    private function createExpressionToRegexCache() {
        $blockables = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBlocker()
            ->getResolvedBlockables();
        // Create regex cache for hosts
        foreach ($blockables as $blockable) {
            // Iterate all wildcard URLs
            foreach ($blockable->getRegularExpressions() as $expression => $regex) {
                if (!isset($this->expressionToRegexCache[$expression]) && !empty($expression)) {
                    // First, mark as non-host / non-URL
                    $this->expressionToRegexCache[$expression] = \false;
                    $useExpression = \trim($expression, '*');
                    if (
                        !\DevOwl\RealCookieBanner\Utils::startsWith($useExpression, 'http://') &&
                        !\DevOwl\RealCookieBanner\Utils::startsWith($useExpression, 'https://')
                    ) {
                        $useExpression = 'https://' . $useExpression;
                    }
                    if (\filter_var($useExpression, \FILTER_VALIDATE_URL)) {
                        $useExpression = \parse_url($useExpression);
                        $useExpression = $useExpression['host'];
                        if (\count(\explode('.', $useExpression)) > 1) {
                            // https://regex101.com/r/oDeUCV/2
                            $useExpression = \sprintf(
                                '/^(https:|http:)?\\/\\/(www\\.)?%s$/',
                                \preg_quote($useExpression, '/')
                            );
                            $this->expressionToRegexCache[$expression] = $useExpression;
                        }
                    }
                }
            }
        }
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\view\blocker\LinkRelBlocker())
            : self::$me;
    }
}
