<?php

namespace Miakiwi\Papir\Traits;

use Miakiwi\Papir\Config;



trait HasConfig
{
    /**
     * The configuration
     * @var Config
     */
    protected ?Config $config = null;



    /**
     * Sets the configuration
     * @param Config $config The configuration
     * @return void
     */
    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }



    /**
     * Gets the configuration
     * @return Config
     */
    public function getConfig(): Config
    {
        if ($this->config === null) {
            $this->config = Config::getDefault();
        }

        return $this->config;
    }
}