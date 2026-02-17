<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpConflict extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 409;
    }

    public static function literalCode(): string
    {
        return "CONFLICT";
    }

    public static function reasonPhrase(): string
    {
        return "Conflict";
    }
}
