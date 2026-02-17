<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpExpectationFailed extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 417;
    }

    public static function literalCode(): string
    {
        return "EXPECTATION_FAILED";
    }

    public static function reasonPhrase(): string
    {
        return "Expectation Failed";
    }
}
