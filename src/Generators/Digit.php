<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Class Digit
 *
 * Digit generator
 *
 * @package Rokde\StringFormatter\Generators
 */
class Digit extends Base
{
    /**
     * identifier for generator
     *
     * @var array|string
     */
    protected $identifier = [
        '1',
        '#',
    ];

    /**
     * generates a char
     *
     * @param string $identifier
     * @param int|null $options
     *
     * @return string
     */
    public function generate($identifier, $options = null)
    {
        $count = empty($options) ? 1 : intval($options);

        $alphabet = range(0, 9);

        return $this->times($count, function () use ($alphabet) {
            return $alphabet[array_rand($alphabet, 1)];
        });
    }
}