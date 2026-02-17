<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpNotModified extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 304;
    }

    public static function literalCode(): string
    {
        return "NOT_MODIFIED";
    }

    public static function reasonPhrase(): string
    {
        return "Not Modified";
    }
}
