<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpOriginDNSError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 530;
    }

    public static function literalCode(): string
    {
        return "ORIGIN_DNS_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "Origin DNS Error";
    }
}
