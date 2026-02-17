<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpHTTPRequestSentToHTTPSPort extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 497;
    }

    public static function literalCode(): string
    {
        return "HTTP_REQUEST_SENT_TO_HTTPS_PORT";
    }

    public static function reasonPhrase(): string
    {
        return "HTTP Request Sent to HTTPS Port";
    }
}
