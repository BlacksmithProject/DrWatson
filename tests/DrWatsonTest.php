<?php
declare(strict_types=1);

namespace BSP\DrWatson\Tests;

use BSP\DrWatson\DrWatson;
use BSP\DrWatson\ExceptionType;
use PHPUnit\Framework\TestCase;

final class DrWatsonTest extends TestCase
{
    public function testReportWithDrWatson(): void
    {
        $exception = DrWatson::report(
            ExceptionType::INPUT(),
            'input.email.invalid',
            'email',
            'It seems that User provided an invalid email. Please make sure a typo was not made.'
        );

        $this->assertInstanceOf(\Exception::class, $exception);
        $this->assertInstanceOf(DrWatson::class, $exception);
        $this->assertTrue(ExceptionType::INPUT()->equals($exception->type()));
        $this->assertSame('input.email.invalid', $exception->message());
        $this->assertSame('email', $exception->suspect());
        $this->assertSame(
            'It seems that User provided an invalid email. Please make sure a typo was not made.',
            $exception->help()
        );
        $this->assertSame(0, $exception->code());
    }
}
