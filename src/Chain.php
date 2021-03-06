<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

/**
 * Class Chain
 *
 * @package Particle\Filter
 */
class Chain
{
    /**
     * @var FilterRule[]
     */
    protected $rules;

    /**
     * Execute all filters in the chain
     *
     * @param mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        /** @var FilterRule $rule */
        foreach ($this->rules as $rule) {
            $value = $rule->filter($value);
        }

        return $value;
    }

    /**
     * Add a new rule to the chain
     *
     * @param FilterRule $rule
     * @return $this
     */
    public function addRule(FilterRule $rule)
    {
        $this->rules[] = $rule;

        return $this;
    }
}
