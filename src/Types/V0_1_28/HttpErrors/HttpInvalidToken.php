<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpInvalidToken extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 498;
    }

    public static function literalCode(): string
    {
        return "INVALID_TOKEN";
    }

    public static function reasonPhrase(): string
    {
        return "Invalid Token";
    }
}
