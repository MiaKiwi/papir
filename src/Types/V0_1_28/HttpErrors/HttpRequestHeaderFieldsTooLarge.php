<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestHeaderFieldsTooLarge extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 431;
    }

    public static function literalCode(): string
    {
        return "REQUEST_HEADER_FIELDS_TOO_LARGE";
    }

    public static function reasonPhrase(): string
    {
        return "Request Header Fields Too Large";
    }
}
