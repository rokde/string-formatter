<?php

namespace Rokde\StringFormatter\Generators;

/**
 * Class Base
 *
 * abstract base generator
 *
 * @package Rokde\StringFormatter\Generators
 */
abstract class Base implements Generator
{
    /**
     * identifier for generator
     *
     * @var array|string
     */
    protected $identifier;

    /**
     * returns all identifier
     *
     * @return array|string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * generates a char
     *
     * @param string $identifier
     * @param mixed|null $options
     *
     * @return string
     */
    abstract public function generate($identifier, $options = null);

    /**
     * call a callable multiple times
     *
     * @param int $count
     * @param callable $callable
     *
     * @return string
     */
    protected function times($count, $callable)
    {
        $result = '';
        for ($i = 0; $i < $count; $i++) {
            $result .= call_user_func($callable);
        }

        return $result;
    }
}