<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpImATeapot extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 418;
    }

    public static function literalCode(): string
    {
        return "IM_A_TEAPOT";
    }

    public static function reasonPhrase(): string
    {
        return "I'm a teapot";
    }
}
