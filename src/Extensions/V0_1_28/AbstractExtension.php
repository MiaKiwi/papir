<?php

namespace Miakiwi\Papier\Extensions\V0_1_28;

use Miakiwi\Papier\Traits\HasConfig;



abstract class AbstractExtension implements ExtensionInterface
{
    use HasConfig;



    /**
     * The code of the extension
     * @var string
     */
    protected static string $code;



    public function getCode(): string
    {
        return static::$code;
    }
}