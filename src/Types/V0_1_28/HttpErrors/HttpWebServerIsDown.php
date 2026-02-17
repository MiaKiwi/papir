<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;



class HttpWebServerIsDown extends AbstractHttpError
{
    public static function numericCode(): int
    {
        return 521;
    }

    public static function literalCode(): string
    {
        return "WEB_SERVER_IS_DOWN";
    }

    public static function reasonPhrase(): string
    {
        return "Web Server Is Down";
    }
}
