<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUnprocessableEntity extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 422;
    }

    public static function literalCode(): string
    {
        return "UNPROCESSABLE_ENTITY";
    }

    public static function reasonPhrase(): string
    {
        return "Unprocessable Entity";
    }
}
