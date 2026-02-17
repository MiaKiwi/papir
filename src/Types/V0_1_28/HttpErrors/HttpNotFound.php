<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNotFound extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 404;
    }

    public static function literalCode(): string
    {
        return "NOT_FOUND";
    }

    public static function reasonPhrase(): string
    {
        return "Not Found";
    }
}
