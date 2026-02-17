<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpFailedDependency extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 424;
    }

    public static function literalCode(): string
    {
        return "FAILED_DEPENDENCY";
    }

    public static function reasonPhrase(): string
    {
        return "Failed Dependency";
    }
}
