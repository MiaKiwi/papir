<?php

namespace Miakiwi\Papir;



class Config
{
    /**
     * Whether to enable metadata in responses
     * @var bool
     */
    protected bool $metadataEnabled = true;

    /**
     * The datetime format for responses
     * @var string
     */
    protected string $datetimeFormat = 'Y-m-d\TH:i:sP';

    /**
     * Whether to include the format version header in HTTP responses ('kapir-version')
     * @var bool
     */
    // protected bool $includeFormatVersionHeaderInHTTP = true;

    /**
     * Whether to include response time in metadata
     * @var bool
     */
    protected bool $includeResponseTimeInMetadata = true;

    /**
     * Whether to include omissible members in responses
     * @var bool
     */
    protected bool $includeOmissibleMembers = true;

    /**
     * Whether to throw an exception when an error contains duplicate suberrors
     * @var bool
     */
    protected bool $throwExceptionOnDuplicateSubErrors = false;

    /**
     * Whether to prettify JSON output
     * @var bool
     */
    protected bool $prettifyJsonOutput = false;



    /**
     * The global default response configuration instance
     * @var ?self
     */
    protected static ?self $default = null;



    /**
     * Creates a new Config instance
     * @param array<string, mixed> $options Configuration options
     */
    public function __construct(array $options = [])
    {
        $this->setMetadataEnabled($options['metadataEnabled'] ?? true);
        $this->setDatetimeFormat($options['datetimeFormat'] ?? 'Y-m-d\TH:i:sP');
        // $this->setIncludeFormatVersionHeaderInHTTP($options['includeFormatVersionHeaderInHTTP'] ?? true);
        $this->setIncludeResponseTimeInMetadata($options['includeResponseTimeInMetadata'] ?? true);
        $this->setIncludeOmissibleMembers($options['includeOmissibleMembers'] ?? true);
        $this->setThrowExceptionOnDuplicateSubErrors($options['throwExceptionOnDuplicateSubErrors'] ?? false);
        $this->setPrettifyJsonOutput($options['prettifyJsonOutput'] ?? false);
    }



    public function setMetadataEnabled(bool $enabled): void
    {
        $this->metadataEnabled = $enabled;
    }

    public function metadataEnabled(): bool
    {
        return $this->metadataEnabled;
    }



    public function setDatetimeFormat(string $format): void
    {
        // Check if the format is valid
        try {
            (new \DateTime())->format($format);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Invalid datetime format: {$format}");
        }

        $this->datetimeFormat = $format;
    }

    public function datetimeFormat(): string
    {
        return $this->datetimeFormat;
    }



    // public function setIncludeFormatVersionHeaderInHTTP(bool $include): void
    // {
    //     $this->includeFormatVersionHeaderInHTTP = $include;
    // }

    // public function includeFormatVersionHeaderInHTTP(): bool
    // {
    //     return $this->includeFormatVersionHeaderInHTTP;
    // }



    public function setIncludeResponseTimeInMetadata(bool $include): void
    {
        $this->includeResponseTimeInMetadata = $include;
    }

    public function includeResponseTimeInMetadata(): bool
    {
        return $this->includeResponseTimeInMetadata;
    }



    public function setIncludeOmissibleMembers(bool $include): void
    {
        $this->includeOmissibleMembers = $include;
    }

    public function includeOmissibleMembers(): bool
    {
        return $this->includeOmissibleMembers;
    }



    public function setThrowExceptionOnDuplicateSubErrors(bool $throw): void
    {
        $this->throwExceptionOnDuplicateSubErrors = $throw;
    }

    public function throwExceptionOnDuplicateSubErrors(): bool
    {
        return $this->throwExceptionOnDuplicateSubErrors;
    }



    public function setPrettifyJsonOutput(bool $prettify): void
    {
        $this->prettifyJsonOutput = $prettify;
    }

    public function prettifyJsonOutput(): bool
    {
        return $this->prettifyJsonOutput;
    }



    /**
     * Sets the global default Config instance
     * @param Config $config
     * @return void
     */
    public static function setDefault(self $config): void
    {
        self::$default = $config;
    }



    /**
     * Gets the global default Config instance
     * @return Config The default Config instance
     */
    public static function getDefault(): self
    {
        if (self::$default === null) {
            self::setDefault(new self());
        }

        return self::$default;
    }
}