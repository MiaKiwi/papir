<?php

namespace Miakiwi\Papier\Serializers;

use Miakiwi\Papier\Config;
use Miakiwi\Papier\Responses\ResponseInterface;



interface SerializerInterface
{
    /**
     * Gets the MIME type of the serialized data
     * @return string The MIME type of the serialized data
     */
    public static function getSerializedMimeType(): string;



    /**
     * Serializes the response
     * @param ResponseInterface $response The response instance
     * @param Config $config The configuration instance
     * @return string The serialized response
     */
    public static function serialize(ResponseInterface $response, Config $config): string;
}