<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpSSLHandshakeFailed extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 525;
    }

    public static function literalCode(): string
    {
        return "SSL_HANDSHAKE_FAILED";
    }

    public static function reasonPhrase(): string
    {
        return "SSL Handshake Failed";
    }
}
