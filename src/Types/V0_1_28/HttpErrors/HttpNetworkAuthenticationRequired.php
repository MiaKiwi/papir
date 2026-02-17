<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNetworkAuthenticationRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 511;
    }

    public static function literalCode(): string
    {
        return "NETWORK_AUTHENTICATION_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Network Authentication Required";
    }
}
