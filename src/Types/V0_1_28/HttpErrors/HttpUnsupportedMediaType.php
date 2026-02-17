<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUnsupportedMediaType extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 415;
    }

    public static function literalCode(): string
    {
        return "UNSUPPORTED_MEDIA_TYPE";
    }

    public static function reasonPhrase(): string
    {
        return "Unsupported Media Type";
    }
}
