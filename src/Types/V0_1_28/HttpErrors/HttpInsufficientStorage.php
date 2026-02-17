<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpInsufficientStorage extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 507;
    }

    public static function literalCode(): string
    {
        return "INSUFFICIENT_STORAGE";
    }

    public static function reasonPhrase(): string
    {
        return "Insufficient Storage";
    }
}
