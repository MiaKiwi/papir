<?php

namespace Miakiwi\Papir\Types\V0_1_28;

use Miakiwi\Papir\Config;
use Miakiwi\Papir\Traits\HasConfig;



class Error implements TypeInterface
{
    use HasConfig;



    /**
     * The error code
     * @var string
     */
    protected string $code;

    /**
     * The error message
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * The suberrors
     * @var SubError[]
     */
    protected array $subErrors = [];



    /**
     * Creates a new Error instance
     * @param string $code The error code
     * @param string|null $message The error message
     * @param SubError[] $subErrors The suberrors
     */
    public function __construct(string $code, ?string $message = null, array $subErrors = [])
    {
        $this->code = $code;
        $this->message = $message;
        $this->setSubErrors($subErrors);
    }



    /**
     * Gets the error code
     * @return string The error code
     */
    public function getCode(): string
    {
        return $this->code;
    }



    /**
     * Gets the error message
     * @return string|null The error message
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }



    /**
     * Gets the suberrors
     * @return SubError[] The suberrors
     */
    public function getSubErrors(): array
    {
        return $this->subErrors;
    }



    /**
     * Gets the suberrors by code
     * @param string $code The suberror code
     * @return SubError[] The suberrors with the given code
     */
    public function getSubErrorsByCode(string $code): array
    {
        return array_filter($this->subErrors, fn(SubError $subError) => $subError->getCode() === $code);
    }



    /**
     * Gets the suberrors by code and message
     * @param string $code The suberror code
     * @param string|null $message The suberror message
     * @return SubError[] The suberrors with the given code and message
     */
    public function getSubErrorsByCodeAndMessage(string $code, ?string $message): array
    {
        return array_filter(
            $this->subErrors,
            fn(SubError $subError) =>
            $subError->getCode() === $code && $subError->getMessage() === $message
        );
    }



    /**
     * Sets the error message
     * @param mixed $message The error message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }



    /**
     * Gets the number of suberrors
     * @return int The number of suberrors
     */
    public function subErrorsCount(): int
    {
        return \count($this->subErrors);
    }



    /**
     * Checks if the error has the given suberror
     * @param SubError $subError The suberror to check
     * @return bool True if the error has the given suberror, false otherwise
     */
    public function hasSubError(SubError $subError): bool
    {
        $similarSubErrors = $this->getSubErrorsByCodeAndMessage(
            $subError->getCode(),
            $subError->getMessage()
        );

        return \count($similarSubErrors) > 0;
    }



    /**
     * Adds a suberror to the error
     * 
     * @param SubError $subError The suberror to add
     * @throws \InvalidArgumentException If the suberror is already included and the config forbids duplicates
     * @return void
     */
    public function addSubError(SubError $subError): void
    {
        // Check if the suberror is already present
        $alreadyIncluded = $this->hasSubError($subError);

        if ($alreadyIncluded && $this->getConfig()->throwExceptionOnDuplicateSubErrors()) {
            throw new \InvalidArgumentException('The suberror is already included in the error.');
        }

        $this->subErrors[] = $subError;
    }



    /**
     * Sets the suberrors
     * @param SubError[] $subErrors The suberrors to set
     * @return void
     */
    public function setSubErrors(array $subErrors): void
    {
        $this->subErrors = [];

        foreach ($subErrors as $subError) {
            $this->addSubError($subError);
        }
    }



    /**
     * Removes similar suberrors from the error
     * @param SubError $subError The suberror to remove
     * @return void
     */
    public function removeSubError(SubError $subError): void
    {
        $this->subErrors = array_filter(
            $this->subErrors,
            fn(SubError $existingSubError) =>
            !(
                $existingSubError->getCode() === $subError->getCode() &&
                $existingSubError->getMessage() === $subError->getMessage()
            )
        );
    }



    public function isValid(?Config $config = null): bool
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        $value = $this->toPHPValue($config);

        // Additional members are not allowed
        $allowedMembers = ['code', 'message', 'errors'];
        foreach ($value as $key => $val) {
            if (!\in_array($key, $allowedMembers, true)) {
                return false;
            }
        }

        // 1. Code must be a non-empty string
        // 2. Message can be omitted, null or a non-empty string
        // 3. Errors can be omitted, an empty array or an array of valid SubErrors
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
            ) &&
            (
                // Suberrors validation
                !\array_key_exists('errors', $value) ||
                (
                    \is_array($value['errors']) &&
                    array_reduce(
                        $this->getSubErrors(),
                        fn(bool $carry, $subError) => $carry && $subError instanceof SubError && $subError->isValid(),
                        true
                    )
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

        // Only include suberrors if there are any
        // or if the config allows omissible members
        if (
            $this->subErrorsCount() > 0 ||
            $config->includeOmissibleMembers()
        ) {
            $result['errors'] = array_map(
                fn(SubError $subError) => $subError->toPHPValue($config),
                $this->subErrors
            );
        }

        return $result;
    }
}