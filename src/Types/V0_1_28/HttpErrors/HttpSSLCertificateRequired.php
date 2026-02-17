<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpSSLCertificateRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 496;
    }

    public static function literalCode(): string
    {
        return "SSL_CERTIFICATE_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "SSL Certificate Required";
    }
}
