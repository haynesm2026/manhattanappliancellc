<?php

namespace DevOwl\RealCookieBanner\view\blockable;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Describe a blockable item by selector syntax and regular expressions (to be used in `href` and `src`).
 */
abstract class Blockable {
    use UtilsProvider;
    /**
     * See `SelectorSyntax`.
     *
     * @var SelectorSyntax[]
     */
    private $selectorSyntax = [];
    private $regexp = ['wildcard' => [], 'contains' => []];
    /**
     * Generate the custom element blockers and regular expressions and append
     * it to this blockable instance.
     *
     * @param string[] $blockers
     */
    public function appendFromStringArray($blockers) {
        if (!\is_array($blockers)) {
            return;
        }
        // Filter out custom element expressions
        foreach ($blockers as $idx => $line) {
            $selectorSyntax = \DevOwl\RealCookieBanner\view\blockable\SelectorSyntax::probableCreateInstance(
                $line,
                $this
            );
            if ($selectorSyntax !== \false) {
                unset($blockers[$idx]);
                $this->selectorSyntax[] = $selectorSyntax;
            }
        }
        foreach ($blockers as $expression) {
            $this->regexp['wildcard'][
                $expression
            ] = \DevOwl\RealCookieBanner\Utils::createRegxpPatternFromWildcardedName($expression);
        }
        // Force to wildcard all hosts look like a `contains`
        foreach ($blockers as $host) {
            $this->regexp['contains'][$host] = \DevOwl\RealCookieBanner\Utils::createRegxpPatternFromWildcardedName(
                '*' . $host . '*'
            );
        }
    }
    /**
     * Get the blocker ID. This is added as a custom HTML attribute to the blocked
     * element so your frontend can e.g. add a visual content blocker.
     *
     * @return int|null
     */
    abstract public function getBlockerId();
    /**
     * Get required IDs. This is added as a custom HTML attribute to the blocked
     * element so your frontend can determine which items by ID are needed so the
     * item can be unblocked.
     *
     * @return int[]
     */
    abstract public function getRequiredIds();
    /**
     * The criteria type. This is added as a custom HTML attribute to the blocked
     * element so your frontend can determine the origin for the `getRequiredIds`.
     * E.g. differ between TCF vendors and another custom criteria.
     *
     * @return string
     */
    abstract public function getCriteria();
    /**
     * Determine if this blockable should be blocked.
     */
    public function hasBlockerId() {
        return $this->getBlockerId() !== null;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getSelectorSyntax() {
        return $this->selectorSyntax;
    }
    /**
     * Getter.
     *
     * @return string[]
     */
    public function getRegularExpressions() {
        return $this->regexp['wildcard'] ?? [];
    }
    /**
     * Getter.
     *
     * @return string[]
     */
    public function getContainsRegularExpressions() {
        return $this->regexp['contains'] ?? [];
    }
}
