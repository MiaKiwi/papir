<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestEntityTooLarge extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 413;
    }

    public static function literalCode(): string
    {
        return "REQUEST_ENTITY_TOO_LARGE";
    }

    public static function reasonPhrase(): string
    {
        return "Request Entity Too Large";
    }
}
