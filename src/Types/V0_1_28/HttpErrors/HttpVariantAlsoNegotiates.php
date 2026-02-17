<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpVariantAlsoNegotiates extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 506;
    }

    public static function literalCode(): string
    {
        return "VARIANT_ALSO_NEGOTIATES";
    }

    public static function reasonPhrase(): string
    {
        return "Variant Also Negotiates";
    }
}
