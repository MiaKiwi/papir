<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpClientClosedRequest extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 499;
    }

    public static function literalCode(): string
    {
        return "CLIENT_CLOSED_REQUEST";
    }

    public static function reasonPhrase(): string
    {
        return "Client Closed Request";
    }
}
