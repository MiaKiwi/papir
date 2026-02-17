<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpLoginTimeout extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 440;
    }

    public static function literalCode(): string
    {
        return "LOGIN_TIMEOUT";
    }

    public static function reasonPhrase(): string
    {
        return "Login Time-out";
    }
}
