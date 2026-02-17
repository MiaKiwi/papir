<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpPageExpired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 419;
    }

    public static function literalCode(): string
    {
        return "PAGE_EXPIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Page Expired";
    }
}
