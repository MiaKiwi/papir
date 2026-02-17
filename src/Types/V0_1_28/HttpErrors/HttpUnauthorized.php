<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUnauthorized extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 401;
    }

    public static function literalCode(): string
    {
        return "UNAUTHORIZED";
    }

    public static function reasonPhrase(): string
    {
        return "Unauthorized";
    }
}
