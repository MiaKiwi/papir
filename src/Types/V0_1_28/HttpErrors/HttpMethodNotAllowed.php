<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpMethodNotAllowed extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 405;
    }

    public static function literalCode(): string
    {
        return "METHOD_NOT_ALLOWED";
    }

    public static function reasonPhrase(): string
    {
        return "Method Not Allowed";
    }
}
