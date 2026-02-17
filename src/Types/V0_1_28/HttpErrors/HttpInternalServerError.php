<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpInternalServerError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 500;
    }

    public static function literalCode(): string
    {
        return "INTERNAL_SERVER_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "Internal Server Error";
    }
}
