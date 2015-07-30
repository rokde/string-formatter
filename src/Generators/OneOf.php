<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Class OneOf
 *
 * One-Of generator will use one of the given option values
 *
 * @package Rokde\StringFormatter\Generators
 */
class OneOf extends Base
{
    /**
     * identifier for generator
     *
     * @var array|string
     */
    protected $identifier = '.';

    /**
     * generates a char
     *
     * @param string $identifier
     * @param mixed|null $options
     *
     * @return string
     */
    public function generate($identifier, $options = null)
    {
        if (empty($options)) {
            return '';
        }

        return $options[rand(0, strlen($options) - 1)];
    }
}