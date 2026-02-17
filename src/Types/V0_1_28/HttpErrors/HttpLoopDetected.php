<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpLoopDetected extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 508;
    }

    public static function literalCode(): string
    {
        return "LOOP_DETECTED";
    }

    public static function reasonPhrase(): string
    {
        return "Loop Detected";
    }
}
