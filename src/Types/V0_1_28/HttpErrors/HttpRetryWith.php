<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRetryWith extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 449;
    }

    public static function literalCode(): string
    {
        return "RETRY_WITH";
    }

    public static function reasonPhrase(): string
    {
        return "Retry With";
    }
}
