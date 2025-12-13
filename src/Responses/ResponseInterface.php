<?php

namespace Miakiwi\Papier\Responses;

use Miakiwi\Papier\Config;



interface ResponseInterface
{
    /**
     * Converts the response to an array
     * @param Config $config The configuration instance
     * @return array The array representation of the response
     */
    public function toArray(Config $config): array;



    /**
     * Checks if the response is valid
     * @param Config $config The configuration instance
     * @return bool True if the response is valid, false otherwise
     */
    public function isValid(Config $config): bool;
}