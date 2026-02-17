<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNotImplemented extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 501;
    }

    public static function literalCode(): string
    {
        return "NOT_IMPLEMENTED";
    }

    public static function reasonPhrase(): string
    {
        return "Not Implemented";
    }
}
