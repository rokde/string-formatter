<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Class Alnum
 *
 * Alpha-numeric generator
 *
 * @package Rokde\StringFormatter\Generators
 */
class Alnum extends Base
{
    /**
     * identifier for generator
     *
     * @var array|string
     */
    protected $identifier = '*';

    /**
     * alphabet
     *
     * @var array
     */
    private $alphabet = [];

    /**
     * create alphabet
     */
    public function __construct()
    {
        $this->alphabet = array_merge(range('A', 'Z'), range(0, 9), range('a', 'z'));
    }

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

        $alphabet = $this->alphabet;

        return $this->times($count, function () use ($alphabet) {
            return $alphabet[array_rand($alphabet, 1)];
        });
    }
}