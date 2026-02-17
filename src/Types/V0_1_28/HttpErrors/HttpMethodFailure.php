<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpMethodFailure extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 420;
    }

    public static function literalCode(): string
    {
        return "METHOD_FAILURE";
    }

    public static function reasonPhrase(): string
    {
        return "Method Failure";
    }
}
