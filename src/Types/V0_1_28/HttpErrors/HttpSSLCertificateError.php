<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpSSLCertificateError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 495;
    }

    public static function literalCode(): string
    {
        return "SSL_CERTIFICATE_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "SSL Certificate Error";
    }
}
