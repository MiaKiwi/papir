<?php

namespace Miakiwi\Papir\Serializers;

use Miakiwi\Papir\Config;
use Miakiwi\Papir\Responses\ResponseInterface;



class JsonSerializer extends AbstractSerializer
{
    /**
     * The MIME type of the serialized data
     * @var string
     */
    protected static string $MIME_TYPE = 'application/json';



    public static function serialize(ResponseInterface $response, ?Config $config = null): string
    {
        if ($config === null) {
            $config = Config::getDefault();
        }

        $data = $response->toArray($config);

        $prettify = $config->prettifySerializerOutput();

        $jsonOptions = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        if ($prettify) {
            $jsonOptions |= JSON_PRETTY_PRINT;
        }

        return json_encode($data, $jsonOptions);
    }
}