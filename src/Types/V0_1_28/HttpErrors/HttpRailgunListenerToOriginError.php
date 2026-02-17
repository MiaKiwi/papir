<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpRailgunListenerToOriginError extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 527;
    }

    public static function literalCode(): string
    {
        return "RAILGUN_LISTENER_TO_ORIGIN_ERROR";
    }

    public static function reasonPhrase(): string
    {
        return "Railgun Listener to Origin Error";
    }
}
