<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestTimeout extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 408;
    }

    public static function literalCode(): string
    {
        return "REQUEST_TIMEOUT";
    }

    public static function reasonPhrase(): string
    {
        return "Request Timeout";
    }
}
