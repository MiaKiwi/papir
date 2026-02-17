<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpConnectionTimedOut extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 522;
    }

    public static function literalCode(): string
    {
        return "CONNECTION_TIMED_OUT";
    }

    public static function reasonPhrase(): string
    {
        return "Connection Timed Out";
    }
}
