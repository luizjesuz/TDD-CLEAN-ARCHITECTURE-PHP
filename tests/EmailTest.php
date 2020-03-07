<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use KW13\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testCanbeCreatedFromValidEmailAdderss(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }


    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
