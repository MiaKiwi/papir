<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpLocked extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 423;
    }

    public static function literalCode(): string
    {
        return "LOCKED";
    }

    public static function reasonPhrase(): string
    {
        return "Locked";
    }
}
