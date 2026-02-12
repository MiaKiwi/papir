<?php

namespace Miakiwi\Papir\Tests\V0_1_28;

use Miakiwi\Papir\Config;
use Miakiwi\Papir\Types\V0_1_28\Error;
use Miakiwi\Papir\Types\V0_1_28\SubError;
use PHPUnit\Framework\TestCase;



final class ErrorTest extends TestCase
{
    public function testErrorCreationWithoutSubErrors(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is an error message.';

        $error = new Error($code, $message);

        $this->assertInstanceOf(Error::class, $error);
        $this->assertEquals($code, $error->getCode());
        $this->assertEquals($message, $error->getMessage());
    }

    public function testErrorCreationWithSubErrors(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is an error message.';
        $subErrors = [
            new SubError('SUBERROR_CODE_1', 'This is the first suberror message.'),
            new SubError('SUBERROR_CODE_2', 'This is the second suberror message.'),
        ];

        $error = new Error($code, $message, $subErrors);

        $this->assertInstanceOf(Error::class, $error);
        $this->assertEquals($code, $error->getCode());
        $this->assertEquals($message, $error->getMessage());
        $this->assertEquals(2, $error->subErrorsCount());
        $this->assertEquals($subErrors, $error->getSubErrors());
    }

    public function testErrorThrowsExceptionOnDuplicateSubErrors(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is an error message.';

        $subErrorCode = 'DUPLICATE_SUBERROR_CODE';

        $config = new Config();
        $config->setThrowExceptionOnDuplicateSubErrors(true);

        $error = new Error($code, $message);
        $error->addSubError(new SubError($subErrorCode));

        // Test with exception expected
        $this->expectException(\InvalidArgumentException::class);
        $error->setConfig($config);
        $error->addSubError(new SubError($subErrorCode));

        // Test without exception
        $config->setThrowExceptionOnDuplicateSubErrors(false);
        $error->setConfig($config);
        $error->addSubError(new SubError($subErrorCode));
        $this->assertEquals(2, $error->subErrorsCount());
    }

    public function testErrorToPHPValueWithoutMessageAndIncludeOmissibleMembers(): void
    {
        $code = 'ERROR_CODE';

        $error = new Error($code);

        $expectedArray = [
            'code' => $code,
            'message' => null,
            'errors' => [],
        ];

        $config = new Config();
        $config->setIncludeOmissibleMembers(true);

        $error->setConfig($config);

        $this->assertEquals($expectedArray, $error->toPHPValue($config));
    }

    public function testErrorToPHPValueWithoutMessageAndExcludeOmissibleMembers(): void
    {
        $code = 'ERROR_CODE';
        $subErrors = [
            new SubError('SUBERROR_CODE_1'),
        ];

        $error = new Error($code, subErrors: $subErrors);

        $expectedArray = [
            'code' => $code,
            'errors' => [
                [
                    'code' => 'SUBERROR_CODE_1',
                ],
            ],
        ];

        $config = new Config();
        $config->setIncludeOmissibleMembers(false);

        $error->setConfig($config);

        $this->assertEquals($expectedArray, $error->toPHPValue($config));
    }

    public function testErrorIsValid(): void
    {
        $code = 'ERROR_CODE';
        $message = 'This is an error message.';
        $subErrors = [
            new SubError('SUBERROR_CODE_1', 'This is the first suberror message.'),
            new SubError('SUBERROR_CODE_2', 'This is the second suberror message.'),
        ];

        $error = new Error($code, $message, $subErrors);

        $this->assertTrue($error->isValid());

        // Test by setting the message to an empty string
        $error->setMessage('');
    }
}