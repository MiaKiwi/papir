<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUnknownError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 520;
    }

    public static function literalCode(): string
    {
        return "UNKNOWN_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "Unknown Error";
    }
}
