<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpSwitchProxy extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 306;
    }

    public static function literalCode(): string
    {
        return "SWITCH_PROXY";
    }

    public static function reasonPhrase(): string
    {
        return "Switch Proxy";
    }
}
