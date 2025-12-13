<?php

namespace Miakiwi\Papier\Types\V0_1_28;

use Miakiwi\Papier\Config;
use Miakiwi\Papier\Traits\HasConfig;



class SubError implements TypeInterface
{
    use HasConfig;



    /**
     * The suberror code
     * @var string
     */
    protected string $code;

    /**
     * The suberror message
     * @var string|null
     */
    protected ?string $message = null;



    /**
     * Creates a new SubError instance
     * @param string $code The suberror code
     * @param string|null $message The suberror message
     */
    public function __construct(string $code, ?string $message = null)
    {
        $this->code = $code;
        $this->message = $message;
    }



    /**
     * Gets the suberror code
     * @return string The suberror code
     */
    public function getCode(): string
    {
        return $this->code;
    }



    /**
     * Gets the suberror message
     * @return string|null The suberror message
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }



    /**
     * Sets the suberror message
     * @param mixed $message The suberror message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }



    public function isValid(?Config $config = null): bool
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        $value = $this->toPHPValue($config);

        // Additional members are not allowed
        $allowedMembers = ['code', 'message'];
        foreach ($value as $key => $val) {
            if (!\in_array($key, $allowedMembers, true)) {
                return false;
            }
        }

        // 1. Code must be a non-empty string
        // 2. Message can be omitted, null or a non-empty string
        return (
            (
                // Code validation
                \is_string($value['code']) &&
                !empty($value['code'])
            ) &&
            (
                // Message validation
                !\array_key_exists('message', $value) ||
                $value['message'] === null ||
                (
                    \is_string($value['message']) &&
                    !empty($value['message'])
                )
            )
        );
    }



    public function toPHPValue(?Config $config = null): array
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        $result = [
            'code' => $this->code
        ];

        // Only include message if it is not null
        // or if the config allows omissible members
        if (
            $this->getMessage() !== null ||
            $config->includeOmissibleMembers()
        ) {
            $result['message'] = $this->message;
        }

        return $result;
    }
}