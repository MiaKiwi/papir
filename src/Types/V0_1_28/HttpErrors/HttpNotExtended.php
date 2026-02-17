<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNotExtended extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 510;
    }

    public static function literalCode(): string
    {
        return "NOT_EXTENDED";
    }

    public static function reasonPhrase(): string
    {
        return "Not Extended";
    }
}
