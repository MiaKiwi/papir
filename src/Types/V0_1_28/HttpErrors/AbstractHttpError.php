<?php

namespace Miakiwi\Papir\Types\V0_1_28\HttpErrors;

use Miakiwi\Papir\Types\V0_1_28\Error;
use Miakiwi\Papir\Types\V0_1_28\SubError;



abstract class AbstractHttpError extends Error
{
    /**
     * Creates a new HTTP error
     * @param string|null $message The error message
     * @param SubError[] $subErrors The suberrors
     */
    public function __construct(string|null $message = null, array $subErrors = [])
    {
        parent::__construct(
            static::literalCode(),
            $message ?? static::reasonPhrase(),
            $subErrors
        );
    }



    /**
     * Returns the HTTP status code, e.g. 404
     * @return void
     */
    abstract public static function numericCode(): int;

    /**
     * Returns the HTTP reason code, e.g. "NOT_FOUND"
     * @return void
     */
    abstract public static function literalCode(): string;

    /**
     * Returns the HTTP reason phrase, e.g. "Not Found"
     * @return void
     */
    abstract public static function reasonPhrase(): string;
}