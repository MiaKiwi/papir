<?php

namespace Miakiwi\Papier\Types\V0_1_28;

use Miakiwi\Papier\Config;



interface TypeInterface
{
    /**
     * Converts the type to a PHP value
     * @param Config $config The configuration instance
     * @return mixed The PHP representation of the type
     */
    public function toPHPValue(Config $config): mixed;



    /**
     * Checks if the type is valid
     * @param Config $config The configuration instance
     * @return bool True if the type is valid, false otherwise
     */
    public function isValid(Config $config): bool;
}