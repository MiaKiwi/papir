<?php

namespace Miakiwi\Papier\Extensions\V0_1_28;

use Miakiwi\Papier\Config;
use Miakiwi\Papier\Responses\V0_1_28\ResponseInterface;



interface ExtensionInterface
{
    /**
     * Gets the extension code
     * @return string The extension code
     */
    public function getCode(): string;



    /**
     * Gets the data of the extension
     * @param ResponseInterface $response The response instance
     * @param array $params Parameters for getting the data
     * @param Config $config The configuration instance
     * @return mixed The data of the extension
     */
    public function getData(ResponseInterface $response, array $params = [], Config $config): mixed;
}