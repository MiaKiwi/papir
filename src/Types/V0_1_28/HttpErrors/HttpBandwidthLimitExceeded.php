<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpBandwidthLimitExceeded extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 509;
    }

    public static function literalCode(): string
    {
        return "BANDWIDTH_LIMIT_EXCEEDED";
    }

    public static function reasonPhrase(): string
    {
        return "Bandwidth Limit Exceeded";
    }
}
