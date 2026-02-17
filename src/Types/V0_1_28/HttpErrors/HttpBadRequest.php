<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpBadRequest extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 400;
    }

    public static function literalCode(): string
    {
        return "BAD_REQUEST";
    }

    public static function reasonPhrase(): string
    {
        return "Bad Request";
    }
}
