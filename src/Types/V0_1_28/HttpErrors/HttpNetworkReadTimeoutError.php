<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNetworkReadTimeoutError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 598;
    }

    public static function literalCode(): string
    {
        return "NETWORK_READ_TIMEOUT_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "Network Read Timeout Error";
    }
}
