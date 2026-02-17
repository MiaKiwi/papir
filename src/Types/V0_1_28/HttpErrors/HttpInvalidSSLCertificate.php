<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpInvalidSSLCertificate extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 526;
    }

    public static function literalCode(): string
    {
        return "INVALID_SSL_CERTIFICATE";
    }

    public static function reasonPhrase(): string
    {
        return "Invalid SSL Certificate";
    }
}
