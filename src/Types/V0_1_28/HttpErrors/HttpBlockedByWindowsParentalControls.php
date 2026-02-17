<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpBlockedByWindowsParentalControls extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 450;
    }

    public static function literalCode(): string
    {
        return "BLOCKED_BY_WINDOWS_PARENTAL_CONTROLS";
    }

    public static function reasonPhrase(): string
    {
        return "Blocked by Windows Parental Controls";
    }
}
