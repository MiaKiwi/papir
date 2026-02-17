<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUnavailableForLegalReasons extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 451;
    }

    public static function literalCode(): string
    {
        return "UNAVAILABLE_FOR_LEGAL_REASONS";
    }

    public static function reasonPhrase(): string
    {
        return "Unavailable For Legal Reasons";
    }
}
