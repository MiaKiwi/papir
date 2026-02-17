<?php

namespace Miakiwi\Papir\Tests\V0_1_28;

use Miakiwi\Papir\Types\V0_1_28\HttpErrors\AbstractHttpError;
use Miakiwi\Papir\Types\V0_1_28\HttpErrors\HttpNotFound;
use PHPUnit\Framework\TestCase;



final class HttpErrorTest extends TestCase
{
    public function testHttpError(): void
    {
        $this->assertTrue(class_exists(AbstractHttpError::class));
        $this->assertTrue(class_exists(HttpNotFound::class));
        $error = new HttpNotFound();

        $this->assertTrue($error->isValid());
        $this->assertEquals("NOT_FOUND", $error->getCode());
        $this->assertEquals("Not Found", $error->getMessage());
        $this->assertEquals(404, $error::numericCode());
        $this->assertEquals("NOT_FOUND", HttpNotFound::literalCode());
        $this->assertEquals("Not Found", HttpNotFound::reasonPhrase());
        $this->assertEquals(404, HttpNotFound::numericCode());
    }
}