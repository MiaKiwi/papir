<?php

namespace Miakiwi\Papier\Serializers;



abstract class AbstractSerializer implements SerializerInterface
{
    /**
     * The MIME type of the serialized data
     * @var string
     */
    protected static string $MIME_TYPE;



    public static function getSerializedMimeType(): string
    {
        return static::$MIME_TYPE;
    }
}