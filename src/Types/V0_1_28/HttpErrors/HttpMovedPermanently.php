<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpMovedPermanently extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 301;
    }

    public static function literalCode(): string
    {
        return "MOVED_PERMANENTLY";
    }

    public static function reasonPhrase(): string
    {
        return "Moved Permanently";
    }
}
