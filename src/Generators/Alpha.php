<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Class Alpha
 *
 * Alpha generator
 *
 * @package Rokde\StringFormatter\Generators
 */
class Alpha extends Base
{
    /**
     * identifier for generator
     *
     * @var array|string
     */
    protected $identifier = [
        'a',
        'A',
        'Aa',
        'aA',
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

        $alphabet = $this->getAlphabet($identifier);

        return $this->times($count, function () use ($alphabet) {
            return $alphabet[array_rand($alphabet, 1)];
        });
    }

    /**
     * get alphabet for identifier
     *
     * @param string $identifier
     *
     * @return array
     */
    private function getAlphabet($identifier)
    {
        if ($identifier === 'a') {
            return range('a', 'z');
        }
        if ($identifier === 'A') {
            return range('A', 'Z');
        }

        return array_merge(range('A', 'Z'), range('a', 'z'));
    }
}