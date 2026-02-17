<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpResumeIncomplete extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 308;
    }

    public static function literalCode(): string
    {
        return "RESUME_INCOMPLETE";
    }

    public static function reasonPhrase(): string
    {
        return "Resume Incomplete";
    }
}
