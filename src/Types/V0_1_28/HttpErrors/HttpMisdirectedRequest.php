<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpMisdirectedRequest extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 421;
    }

    public static function literalCode(): string
    {
        return "MISDIRECTED_REQUEST";
    }

    public static function reasonPhrase(): string
    {
        return "Misdirected Request";
    }
}
