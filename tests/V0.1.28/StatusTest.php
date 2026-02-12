<?php

namespace Miakiwi\Papir\Tests\V0_1_28;

use Miakiwi\Papir\Types\V0_1_28\Status;
use PHPUnit\Framework\TestCase;



final class StatusTest extends TestCase
{
    public function testStatusCreation(): void
    {
        $statusValue = 'success';

        $status = new Status($statusValue);

        $this->assertInstanceOf(Status::class, $status);
        $this->assertEquals($statusValue, $status->getStatus());
        $this->assertEquals(Status::SUCCESS, $status->getStatus());

        $statusValue = 'error';

        $status->setStatus($statusValue);

        $this->assertEquals($statusValue, $status->getStatus());
        $this->assertEquals(Status::ERROR, $status->getStatus());
    }

    public function testStatusInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $invalidStatusValue = 'invalid_status';

        $status = new Status($invalidStatusValue);
    }

    public function testStatusStaticCreation(): void
    {
        $successStatus = Status::success();
        $errorStatus = Status::error();

        $this->assertInstanceOf(Status::class, $successStatus);
        $this->assertInstanceOf(Status::class, $errorStatus);

        $this->assertEquals(Status::SUCCESS, $successStatus->getStatus());
        $this->assertEquals(Status::ERROR, $errorStatus->getStatus());
    }
}