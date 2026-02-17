<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpProxyAuthenticationRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 407;
    }

    public static function literalCode(): string
    {
        return "PROXY_AUTHENTICATION_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Proxy Authentication Required";
    }
}
