<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpFound extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 302;
    }

    public static function literalCode(): string
    {
        return "FOUND";
    }

    public static function reasonPhrase(): string
    {
        return "Found";
    }
}
