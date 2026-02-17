<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpGone extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 410;
    }

    public static function literalCode(): string
    {
        return "GONE";
    }

    public static function reasonPhrase(): string
    {
        return "Gone";
    }
}
