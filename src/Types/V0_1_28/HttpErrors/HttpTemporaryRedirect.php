<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpTemporaryRedirect extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 307;
    }

    public static function literalCode(): string
    {
        return "TEMPORARY_REDIRECT";
    }

    public static function reasonPhrase(): string
    {
        return "Temporary Redirect";
    }
}
