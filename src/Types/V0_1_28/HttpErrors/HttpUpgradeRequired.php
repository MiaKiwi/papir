<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpUpgradeRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 426;
    }

    public static function literalCode(): string
    {
        return "UPGRADE_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Upgrade Required";
    }
}
