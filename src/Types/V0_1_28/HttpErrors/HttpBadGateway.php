<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpBadGateway extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 502;
    }

    public static function literalCode(): string
    {
        return "BAD_GATEWAY";
    }

    public static function reasonPhrase(): string
    {
        return "Bad Gateway";
    }
}
