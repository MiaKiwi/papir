<?php

namespace Miakiwi\Papir\Tests\V0_1_28;

use Miakiwi\Papir\Config;
use Miakiwi\Papir\Responses\V0_1_28\Response;
use Miakiwi\Papir\Types\V0_1_28\Error;
use Miakiwi\Papir\Types\V0_1_28\Status;
use PHPUnit\Framework\TestCase;



final class ResponseTest extends TestCase
{
    public function testResponseCreation(): void
    {
        $response = new Response(
            Status::success(),
            [
                'hello' => 'world'
            ],
            'Message',
            (new Error('CODE', 'Error message')),
            [
                'page' => 1,
                'per_page' => 10,
                'total_pages' => 5
            ]
        );

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(Status::class, $response->getStatus());
        $this->assertEquals(['hello' => 'world'], $response->getData());
        $this->assertEquals('Message', $response->getMessage());
        $this->assertInstanceOf(Error::class, $response->getError());
        $this->assertEquals(1, $response->getMetadata()['page']);
        $this->assertEquals([], $response->getExtensions());
    }

    public function testResponseCreationWithDefaultStatus(): void
    {
        $response = new Response(
            data: [
                'foo' => 'bar'
            ]
        );

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(Status::class, $response->getStatus());
        $this->assertEquals(Status::SUCCESS, $response->getStatus()->getStatus());
        $this->assertEquals(['foo' => 'bar'], $response->getData());
    }

    public function testResponseFluentCreation(): void
    {
        $response = (new Response())
            ->success()
            ->data(['key' => 'value'])
            ->message('All good!')
            ->addMeta('timestamp', time());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(Status::class, $response->getStatus());
        $this->assertEquals(Status::SUCCESS, $response->getStatus()->getStatus());
        $this->assertEquals(['key' => 'value'], $response->getData());
        $this->assertEquals('All good!', $response->getMessage());
        $this->assertArrayHasKey('timestamp', $response->getMetadata());
    }

    public function testResponseToArrayAndIncludeOmissibleMembers(): void
    {
        $config = new Config();
        $config->setIncludeOmissibleMembers(true);
        $config->setIncludeResponseTimeInMetadata(false);

        $response = (new Response())
            ->error((new Error('ERR_CODE')))
            ->message(null);

            $response->setConfig($config);

        $expectedArray = [
            'version' => $response->getVersion(),
            'status' => 'error',
            'data' => null,
            'message' => null,
            'error' => [
                'code' => 'ERR_CODE',
                'message' => null,
                'errors' => [],
            ],
            'meta' => [],
            'ext' => []
        ];

        $this->assertEquals($expectedArray, $response->toArray($config));
    }
}