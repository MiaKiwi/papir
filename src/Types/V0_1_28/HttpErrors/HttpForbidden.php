<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpForbidden extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 403;
    }

    public static function literalCode(): string
    {
        return "FORBIDDEN";
    }

    public static function reasonPhrase(): string
    {
        return "Forbidden";
    }
}
