<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpServiceUnavailable extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 503;
    }

    public static function literalCode(): string
    {
        return "SERVICE_UNAVAILABLE";
    }

    public static function reasonPhrase(): string
    {
        return "Service Unavailable";
    }
}
