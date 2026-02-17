<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRequestedRangeNotSatisfiable extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 416;
    }

    public static function literalCode(): string
    {
        return "REQUESTED_RANGE_NOT_SATISFIABLE";
    }

    public static function reasonPhrase(): string
    {
        return "Requested Range Not Satisfiable";
    }
}
