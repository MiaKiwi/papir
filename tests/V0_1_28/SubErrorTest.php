<?php

namespace Miakiwi\Papir\Tests\V0_1_28;

use Miakiwi\Papir\Config;
use Miakiwi\Papir\Types\V0_1_28\SubError;
use PHPUnit\Framework\TestCase;



final class SubErrorTest extends TestCase
{
    public function testSubErrorCreation(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is a suberror message.';

        $subError = new SubError($code, $message);

        $this->assertInstanceOf(SubError::class, $subError);
        $this->assertEquals($code, $subError->getCode());
        $this->assertEquals($message, $subError->getMessage());
    }

    public function testSubErrorToPHPValueWithMessage(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is a suberror message.';

        $subError = new SubError($code, $message);

        $expectedArray = [
            'code' => $code,
            'message' => $message,
        ];

        $this->assertEquals($expectedArray, $subError->toPHPValue());
    }

    public function testSubErrorToPHPValueWithoutMessageAndIncludeOmissibleMembers(): void
    {
        $code = 'ERROR_CODE';

        $subError = new SubError($code);

        $expectedArray = [
            'code' => $code,
            'message' => null,
        ];

        $config = new Config();
        $config->setIncludeOmissibleMembers(true);

        $this->assertEquals($expectedArray, $subError->toPHPValue($config));
    }

    public function testSubErrorToPHPValueWithoutMessageAndExcludeOmissibleMembers(): void
    {
        $code = 'ERROR_CODE';

        $subError = new SubError($code);

        $expectedArray = [
            'code' => $code,
        ];

        $config = new Config();
        $config->setIncludeOmissibleMembers(false);

        $this->assertEquals($expectedArray, $subError->toPHPValue($config));
    }

    public function testSubErrorIsValid(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is a suberror message.';

        $subError = new SubError($code, $message);

        $this->assertTrue($subError->isValid());

        // Test by setting the message to an empty string
        $subError->setMessage('');

        $this->assertFalse($subError->isValid());
    }
}