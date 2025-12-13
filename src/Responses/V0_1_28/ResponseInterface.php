<?php

namespace Miakiwi\Papier\Responses\V0_1_28;

use Miakiwi\Papier\Extensions\V0_1_28\ExtensionInterface;
use Miakiwi\Papier\Types\V0_1_28\Error;
use Miakiwi\Papier\Types\V0_1_28\Status;
use Miakiwi\Papier\Responses\ResponseInterface as BaseResponseInterface;



interface ResponseInterface extends BaseResponseInterface
{
    /**
     * Gets the status of the response
     * @return Status The status of the response
     */
    public function getStatus(): Status;

    /**
     * Sets the status of the response
     * @param Status $status The status of the response
     * @return void
     */
    public function setStatus(Status $status): void;

    /**
     * Sets the status and returns the response instance
     * @param Status $status The status of the response
     * @return static The response instance
     */
    public function status(Status $status): static;

    /**
     * Sets the status to success and returns the response instance
     * @return static The response instance
     */
    public function success(): static;



    /**
     * Gets the version of the response
     * @return string The version of the response
     */
    public function getVersion(): string;



    /**
     * Gets the data of the response
     * @return mixed The data of the response
     */
    public function getData(): mixed;

    /**
     * Sets the data of the response
     * @param mixed $data The data of the response
     * @return void
     */
    public function setData(mixed $data): void;

    /**
     * Sets the data and returns the response instance
     * @param mixed $data The data of the response
     * @return static The response instance
     */
    public function data(mixed $data): static;



    /**
     * Gets the message of the response
     * @return string|null The message of the response
     */
    public function getMessage(): ?string;

    /**
     * Sets the message of the response
     * @param string|null $message The message of the response
     * @return void
     */
    public function setMessage(?string $message): void;

    /**
     * Sets the message and returns the response instance
     * @param string|null $message The message of the response
     * @return static The response instance
     */
    public function message(?string $message): static;



    /**
     * Gets the metadata of the response
     * @return array<string, mixed> The metadata of the response
     */
    public function getMetadata(): array;

    /**
     * Sets the metadata of the response
     * @param array<string, mixed> $metadata The metadata of the response
     * @throws \InvalidArgumentException If the metadata is not an associative array
     * @return void
     */
    public function setMetadata(array $metadata): void;

    /**
     * Adds a metadata entry to the response
     * @param string $key The metadata key
     * @param mixed $value The metadata value
     * @return void
     */
    public function addMetadata(string $key, mixed $value): void;

    /**
     * Removes a metadata entry from the response
     * @param string $key The metadata key
     * @return void
     */
    public function unsetMetadata(string $key): void;

    /**
     * Sets the metadata and returns the response instance
     * @param array<string, mixed> $metadata The metadata of the response
     * @throws \InvalidArgumentException If the metadata is not an associative array
     * @return static The response instance
     */
    public function metadata(array $metadata): static;

    /**
     * Adds a metadata entry and returns the response instance
     * @param string $key The metadata key
     * @param mixed $value The metadata value
     * @return static The response instance
     */
    public function addMeta(string $key, mixed $value): static;

    /**
     * Removes a metadata entry and returns the response instance
     * @param string $key The metadata key
     * @return static The response instance
     */
    public function unsetMeta(string $key): static;



    /**
     * Gets the extensions of the response
     * @return ExtensionInterface[] The extensions of the response
     */
    public function getExtensions(): array;

    /**
     * Sets the extensions of the response
     * @param ExtensionInterface[] $extensions The extensions of the response
     * @return void
     */
    public function setExtensions(array $extensions): void;

    /**
     * Adds an extension to the response
     * @param ExtensionInterface $extension The extension to add
     * @return void
     */
    public function addExtension(ExtensionInterface $extension): void;

    /**
     * Removes an extension from the response
     * @param ExtensionInterface $extension The extension to remove
     * @return void
     */
    public function removeExtension(ExtensionInterface $extension): void;

    /**
     * Checks if the response has an extension by its code
     * @param string $code The extension code
     * @return void
     */
    public function hasExtension(string $code): bool;

    /**
     * Sets the extensions and returns the response instance
     * @param ExtensionInterface[] $extensions The extensions of the response
     * @return static The response instance
     */
    public function extensions(array $extensions): static;

    /**
     * Adds an extension and returns the response instance
     * @param ExtensionInterface $extension The extension to add
     * @return static The response instance
     */
    public function addExt(ExtensionInterface $extension): static;

    /**
     * Removes an extension and returns the response instance
     * @param ExtensionInterface $extension The extension to remove
     * @return static The response instance
     */
    public function removeExt(ExtensionInterface $extension): static;



    /**
     * Gets the error of the response
     * @return Error|null The error of the response
     */
    public function getError(): Error|null;

    /**
     * Sets the error of the response
     * @param Error|null $error The error of the response
     * @return void
     */
    public function setError(Error|null $error): void;

    /**
     * Sets the status to error, the error and returns the response instance
     * @param Error $error The error of the response
     * @return static The response instance
     */
    public function error(Error $error): static;
}