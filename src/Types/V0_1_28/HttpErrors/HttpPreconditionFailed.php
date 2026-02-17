<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpPreconditionFailed extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 412;
    }

    public static function literalCode(): string
    {
        return "PRECONDITION_FAILED";
    }

    public static function reasonPhrase(): string
    {
        return "Precondition Failed";
    }
}
