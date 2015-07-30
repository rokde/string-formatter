<?php

namespace Rokde\StringFormatter;

use Rokde\StringFormatter\Generators\Generator;

/**
 * Class Formatter
 *
 * @package Rokde\String
 */
class StringFormatter
{
    /**
     * pattern to solve the placeholder tokens with options
     */
    const PATTERN = '~\{(?:([^:])(?:\:?(.*?)))\}~';

    /**
     * all generators with their identifier tokens
     *
     * @var array
     */
    protected $generators = [];

    /**
     * registers a generator for all its identifiers
     *
     * @param \Rokde\StringFormatter\Generators\Generator $generator
     *
     * @return $this
     */
    public function register(Generator $generator)
    {
        foreach ((array)$generator->getIdentifier() as $identifier) {
            $this->generators[$identifier] = [$generator, 'generate'];
        }

        return $this;
    }

    /**
     * formats the given string with the registered generators
     *
     * @param string $format
     *
     * @return string
     */
    public function format($format)
    {
        $generated = $format;

        while (preg_match(self::PATTERN, $generated, $matches, PREG_OFFSET_CAPTURE)) {
            $tokenIdentifier = $matches[1][0];
            $tokenOptions = $matches[2][0];

            $tokenContent = $this->resolveGenerator($tokenIdentifier, (array)$tokenOptions);

            $beforeToken = substr($generated, 0, $matches[0][1]);
            $afterToken = substr($generated, $matches[0][1] + strlen($matches[0][0]));

            $generated = $beforeToken . $tokenContent . $afterToken;
        }

        return $generated;
    }

    /**
     * resolves a generator by token
     *
     * @param string $tokenIdentifier
     * @param array $options
     *
     * @return mixed|string
     */
    private function resolveGenerator($tokenIdentifier, $options)
    {
        if ( ! array_key_exists($tokenIdentifier, $this->generators)) {
            return '';
        }

        $callable = $this->generators[$tokenIdentifier];

        return call_user_func_array($callable, array_merge(['identifier' => $tokenIdentifier], $options));
    }
}