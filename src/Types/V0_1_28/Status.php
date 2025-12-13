<?php

namespace Miakiwi\Papier\Types\V0_1_28;

use Miakiwi\Papier\Config;
use Miakiwi\Papier\Traits\HasConfig;



class Status implements TypeInterface
{
    use HasConfig;



    /**
     * The status value for successful requests
     * @var string
     */
    public const SUCCESS = 'success';

    /**
     * The status value for failed requests
     * @var string
     */
    public const ERROR = 'error';

    /**
     * The status of the request
     * @var string
     */
    protected string $status;



    /**
     * Creates a new Status instance
     * @param string $status The status of the request
     */
    public function __construct(string $status)
    {
        $this->setStatus($status);
    }



    /**
     * Gets the status of the request
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }



    /**
     * Sets the status of the request
     * @param string $status The status of the request
     * @throws \InvalidArgumentException If the status value is invalid
     * @return void
     */
    public function setStatus(string $status): void
    {
        if (!\in_array($status, [self::SUCCESS, self::ERROR], true)) {
            throw new \InvalidArgumentException("Invalid status value: $status");
        }

        $this->status = $status;
    }



    /**
     * Creates a new Status instance with success status
     * @return Status The Status instance
     */
    public static function success(): self
    {
        return new self(self::SUCCESS);
    }



    /**
     * Creates a new Status instance with error status
     * @return Status The Status instance
     */
    public static function error(): self
    {
        return new self(self::ERROR);
    }



    public function isValid(?Config $config = null): bool
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        $value = $this->toPHPValue();

        // Status must be a non-empty string precisely equal to either 'success' or 'error'
        return (
            \is_string($value) &&
            !empty($value) &&
            \in_array($value, [Status::SUCCESS, Status::ERROR], true)
        );
    }



    public function toPHPValue(?Config $config = null): string
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        return $this->status;
    }
}