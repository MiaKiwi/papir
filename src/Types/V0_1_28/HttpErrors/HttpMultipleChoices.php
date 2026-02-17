<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpMultipleChoices extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 300;
    }

    public static function literalCode(): string
    {
        return "MULTIPLE_CHOICES";
    }

    public static function reasonPhrase(): string
    {
        return "Multiple Choices";
    }
}
