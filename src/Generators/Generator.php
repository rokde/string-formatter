<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Interface Generator
 *
 * @package Rokde\StringFormatter\Generators
 */
interface Generator
{
    /**
     * returns all identifier
     *
     * @return array|string
     */
    public function getIdentifier();

    /**
     * generates a char
     *
     * @param string $identifier
     * @param mixed|null $options
     *
     * @return string
     */
    public function generate($identifier, $options = null);
}