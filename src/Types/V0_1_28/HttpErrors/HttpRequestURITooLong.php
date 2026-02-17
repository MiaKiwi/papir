<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestURITooLong extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 414;
    }

    public static function literalCode(): string
    {
        return "REQUESTURI_TOO_LONG";
    }

    public static function reasonPhrase(): string
    {
        return "Request-URI Too Long";
    }
}
