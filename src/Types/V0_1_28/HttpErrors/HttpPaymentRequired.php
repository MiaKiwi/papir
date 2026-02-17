<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpPaymentRequired extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 402;
    }

    public static function literalCode(): string
    {
        return "PAYMENT_REQUIRED";
    }

    public static function reasonPhrase(): string
    {
        return "Payment Required";
    }
}
