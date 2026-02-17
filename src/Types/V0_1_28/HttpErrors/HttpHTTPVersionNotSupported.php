<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpHTTPVersionNotSupported extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 505;
    }

    public static function literalCode(): string
    {
        return "HTTP_VERSION_NOT_SUPPORTED";
    }

    public static function reasonPhrase(): string
    {
        return "HTTP Version Not Supported";
    }
}
