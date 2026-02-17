<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestHeaderTooLarge extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 494;
    }

    public static function literalCode(): string
    {
        return "REQUEST_HEADER_TOO_LARGE";
    }

    public static function reasonPhrase(): string
    {
        return "Request Header Too Large";
    }
}
