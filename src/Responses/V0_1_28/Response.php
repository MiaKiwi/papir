<?php

namespace Miakiwi\Papir\Responses\V0_1_28;

use DateTimeImmutable;
use Miakiwi\Papir\Config;
use Miakiwi\Papir\Extensions\V0_1_28\ExtensionInterface;
use Miakiwi\Papir\Traits\HasConfig;
use Miakiwi\Papir\Types\V0_1_28\Error;
use Miakiwi\Papir\Types\V0_1_28\Status;
use Miakiwi\Papir\Types\V0_1_28\ResponseDataInterface;



class Response implements ResponseInterface
{
    use HasConfig;



    /**
     * The status of the response
     * @var Status
     */
    protected Status $status;

    /**
     * The version of the response
     * @var string
     */
    protected static string $version = '0.1.28';

    /**
     * The data of the response
     * @var mixed
     */
    protected mixed $data = null;

    /**
     * The message of the response
     * @var string|null
     */
    protected string|null $message = null;

    /**
     * The error of the response
     * @var Error|null
     */
    protected Error|null $error = null;

    /**
     * The metadata of the response
     * @var array
     */
    protected array $metadata = [];

    /**
     * The extensions of the response
     * @var array
     */
    protected array $extensions = [];



    /**
     * Creates a new response
     * @param Status|null $status The status of the response
     * @param null|string|bool|int|float|array|ResponseDataInterface $data The data of the response
     * @param string|null $message The message of the response
     * @param Error|null $error The error of the response
     * @param array|null $metadata The metadata of the response
     * @param array $extensions The extensions of the response
     */
    public function __construct(
        Status|null $status = null,
        null|string|bool|int|float|array|ResponseDataInterface $data = null,
        string|null $message = null,
        Error|null $error = null,
        ?array $metadata = null,
        array $extensions = []
    ) {
        if ($status !== null) {
            $this->setStatus($status);
        } else {
            $this->setStatus(Status::success());
        }

        if ($data !== null) {
            $this->setData($data);
        }

        $this->message = $message;
        $this->error = $error;
        $this->setMetadata($metadata ?? []);
        $this->setExtensions($extensions);
    }



    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function status(Status $status): static
    {
        $this->setStatus($status);

        return $this;
    }

    public function success(): static
    {
        $this->setStatus(Status::success());

        return $this;
    }



    public function getVersion(): string
    {
        return static::$version;
    }



    public function getData(): mixed
    {
        return $this->data;
    }

    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    public function data(mixed $data): static
    {
        $this->setData($data);

        return $this;
    }



    public function getMessage(): string|null
    {
        return $this->message;
    }

    public function setMessage(string|null $message): void
    {
        $this->message = $message;
    }

    public function message(string|null $message): static
    {
        $this->setMessage($message);

        return $this;
    }



    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): void
    {
        if (!function_exists('array_is_list')) {
            function array_is_list(array $arr)
            {
                return $arr === [] || (array_keys($arr) === range(0, count($arr) - 1));
            }
        }

        if ($metadata !== [] && array_is_list($metadata)) {
            throw new \InvalidArgumentException('Metadata must be an associative array.');
        }

        $this->metadata = $metadata;
    }

    public function addMetadata(string $key, mixed $value): void
    {
        $this->metadata[$key] = $value;
    }

    public function unsetMetadata(string $key): void
    {
        unset($this->metadata[$key]);
    }

    public function metadata(array $metadata): static
    {
        $this->setMetadata($metadata);

        return $this;
    }

    public function addMeta(string $key, mixed $value): static
    {
        $this->addMetadata($key, $value);

        return $this;
    }

    public function unsetMeta(string $key): static
    {
        $this->unsetMetadata($key);

        return $this;
    }



    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function setExtensions(array $extensions): void
    {
        $this->extensions = [];

        foreach ($extensions as $extension) {
            $this->addExtension($extension);
        }
    }

    public function addExtension(ExtensionInterface $extension): void
    {
        if (!$this->hasExtension($extension->getCode())) {
            $this->extensions[] = $extension;
        }
    }

    public function removeExtension(ExtensionInterface $extension): void
    {
        foreach ($this->extensions as $key => $ext) {
            if ($ext->getCode() === $extension->getCode()) {
                unset($this->extensions[$key]);
            }
        }

        // Reindex the array
        $this->extensions = array_values($this->extensions);
    }

    public function hasExtension(string $code): bool
    {
        foreach ($this->extensions as $extension) {
            if ($extension->getCode() === $code) {
                return true;
            }
        }

        return false;
    }

    public function extensions(array $extensions): static
    {
        $this->setExtensions($extensions);

        return $this;
    }

    public function addExt(ExtensionInterface $extension): static
    {
        $this->addExtension($extension);

        return $this;
    }

    public function removeExt(ExtensionInterface $extension): static
    {
        $this->removeExtension($extension);

        return $this;
    }



    public function getError(): Error|null
    {
        return $this->error;
    }

    public function setError(Error|null $error): void
    {
        if ($this->getStatus() !== Status::ERROR) {
            $this->setStatus(Status::error());
        }

        $this->error = $error;
    }

    public function error(Error $error): static
    {
        $this->setError($error);

        return $this;
    }



    public function isValid(?Config $config = null): bool
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        $value = $this->toArray($config);

        // Additional members are not allowed
        $allowedMembers = ['status', 'version', 'data', 'message', 'error', 'meta', 'ext'];
        foreach ($value as $key => $val) {
            if (!\in_array($key, $allowedMembers, true)) {
                return false;
            }
        }

        // Validate status
        if (!$this->getStatus()->isValid()) {
            return false;
        }

        // Validate version
        if (
            !\is_string($value['version']) ||
            empty($value['version']) ||
            $value['version'] !== static::$version
        ) {
            return false;
        }

        // Validate data
        if (!\array_key_exists('data', $value)) {
            return false;
        }

        // Validate message if present (null or non-empty string)
        if (
            \array_key_exists('message', $value) &&
            $value['message'] !== null &&
            (
                !\is_string($value['message']) ||
                empty($value['message'])
            )
        ) {
            return false;
        }

        // Validate error if present
        if (
            \array_key_exists('error', $value) &&
            $value['error'] !== null &&
            !$this->getError()->isValid()
        ) {
            return false;
        }

        // Validate metadata if present (associative array)
        if (
            \array_key_exists('meta', $value) &&
            !\is_array($value['meta'])
        ) {
            return false;
        }

        // Validate extensions if present (array<string, mixed>))
        if (
            \array_key_exists('ext', $value) &&
            !\is_array($value['ext'])
        ) {
            return false;
        }

        return true;
    }



    public function toArray(?Config $config = null): array
    {
        if ($config === null) {
            $config = $this->getConfig();
        }

        // Mandatory members
        $result = [
            'status' => $this->getStatus()->toPHPValue(),
            'version' => $this->getVersion(),
            'data' => $this->getData() instanceof ResponseDataInterface
                ? $this->getData()->toPHPValue()
                : $this->getData()
        ];

        // Only include message if it is not null
        // or if the config allows omissible members
        if (
            $this->getMessage() !== null ||
            $config->includeOmissibleMembers()
        ) {
            $result['message'] = $this->getMessage();
        }

        // Only include error if it is not null
        // or if the config allows omissible members
        if (
            $this->getError() !== null ||
            $config->includeOmissibleMembers()
        ) {
            $result['error'] = $this->getError()?->toPHPValue();
        }

        // Only include metadata if it is not empty,
        // if the config allows omissible members,
        // and if metadata inclusion is enabled
        if (
            (
                !empty($this->getMetadata()) ||
                $config->includeOmissibleMembers()
            ) &&
            $config->metadataEnabled()
        ) {
            $result['meta'] = $this->getMetadata();
        }

        // If metadata is enabled, include response time
        // if the config requires it
        if ($result['meta'] !== null && $config->includeResponseTimeInMetadata()) {
            $datetimeFormat = $config->datetimeFormat();
            $currentTime = (new DateTimeImmutable())->format($datetimeFormat);

            $result['meta']['response_time'] = $currentTime;
        }

        // Only include extensions if there are any
        // or if the config allows omissible members
        if (
            \count($this->getExtensions()) > 0 ||
            $config->includeOmissibleMembers()
        ) {
            $result['ext'] = $this->getExtensionsData();
        }

        return $result;
    }



    /**
     * Gets the extensions data as an associative array
     * @return array<string, mixed> The extensions data
     */
    public function getExtensionsData(): array
    {
        $extData = [];

        foreach ($this->getExtensions() as $extension) {
            $extensionCode = $extension->getCode();
            $extensionData = $extension->getData($this, []);

            // Transform response data to PHP value if applicable
            if ($extensionData instanceof ResponseDataInterface) {
                $extensionData = $extensionData->toPHPValue();
            }

            $extData[$extensionCode] = $extensionData;
        }

        return $extData;
    }
}