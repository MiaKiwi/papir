<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpSeeOther extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 303;
    }

    public static function literalCode(): string
    {
        return "SEE_OTHER";
    }

    public static function reasonPhrase(): string
    {
        return "See Other";
    }
}
