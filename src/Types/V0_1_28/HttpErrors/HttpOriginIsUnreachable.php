<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpOriginIsUnreachable extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 523;
    }

    public static function literalCode(): string
    {
        return "ORIGIN_IS_UNREACHABLE";
    }

    public static function reasonPhrase(): string
    {
        return "Origin Is Unreachable";
    }
}
