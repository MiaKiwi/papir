<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpTooManyRequests extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 429;
    }

    public static function literalCode(): string
    {
        return "TOO_MANY_REQUESTS";
    }

    public static function reasonPhrase(): string
    {
        return "Too Many Requests";
    }
}
