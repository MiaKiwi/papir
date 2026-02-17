<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpConnectionClosedWithoutResponse extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 444;
    }

    public static function literalCode(): string
    {
        return "CONNECTION_CLOSED_WITHOUT_RESPONSE";
    }

    public static function reasonPhrase(): string
    {
        return "Connection Closed Without Response";
    }
}
