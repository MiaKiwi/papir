<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpGatewayTimeout extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 504;
    }

    public static function literalCode(): string
    {
        return "GATEWAY_TIMEOUT";
    }

    public static function reasonPhrase(): string
    {
        return "Gateway Timeout";
    }
}
