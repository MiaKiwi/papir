<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpPreconditionRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 428;
    }

    public static function literalCode(): string
    {
        return "PRECONDITION_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Precondition Required";
    }
}
