<?php

namespace Miakiwi\Papir\Types\V0_1_28;

use Miakiwi\Papir\Traits\HasConfig;



interface ResponseDataInterface
{
    use HasConfig;


    
    /**
     * Converts the response data to a PHP value
     * @return mixed The PHP representation of the response data
     */
    public function toPHPValue(): mixed;
}