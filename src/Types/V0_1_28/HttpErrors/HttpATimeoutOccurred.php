<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpATimeoutOccurred extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 524;
    }

    public static function literalCode(): string
    {
        return "A_TIMEOUT_OCCURRED";
    }

    public static function reasonPhrase(): string
    {
        return "A Timeout Occurred";
    }
}
