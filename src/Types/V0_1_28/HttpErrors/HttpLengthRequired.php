<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpLengthRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 411;
    }

    public static function literalCode(): string
    {
        return "LENGTH_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Length Required";
    }
}
