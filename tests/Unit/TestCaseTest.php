<?php declare(strict_types=1);

namespace HarmonyIO\PHPUnitExtensionTest\Unit;

use Amp\Promise;
use Amp\Success;
use HarmonyIO\PHPUnitExtension\TestCase;

class TestCaseTest extends TestCase
{
    public function testAssertArrayHasKeyWithoutPromise(): void
    {
        $this->assertArrayHasKey('TheKey', ['TheKey' => 'TheValue']);
    }

    public function testAssertArrayHasKeyWithPromise(): void
    {
        $this->assertArrayHasKey('TheKey', new Success(['TheKey' => 'TheValue']));
    }

    public function testAssertArrayHasNotKeyWithoutPromise(): void
    {
        $this->assertArrayNotHasKey('NotExistingKey', ['TheKey' => 'TheValue']);
    }

    public function testAssertArrayHasNotKeyWithPromise(): void
    {
        $this->assertArrayNotHasKey('NotExistingKey', new Success(['TheKey' => 'TheValue']));
    }

    public function testAssertCountWithoutPromise(): void
    {
        $this->assertCount(1, ['TheKey' => 'TheValue']);
    }

    public function testAssertCountWithPromise(): void
    {
        $this->assertCount(1, new Success(['TheKey' => 'TheValue']));
    }

    public function testAssertEqualsWithoutPromise(): void
    {
        $this->assertEquals(1, '1');
    }

    public function testAssertEqualsWithPromise(): void
    {
        $this->assertEquals(1, new Success('1'));
    }

    public function testAssertFalseWithoutPromise(): void
    {
        $this->assertFalse(false);
    }

    public function testAssertFalseWithPromise(): void
    {
        $this->assertFalse(new Success(false));
    }

    public function testAssertTrueWithoutPromise(): void
    {
        $this->assertTrue(true);
    }

    public function testAssertTrueWithPromise(): void
    {
        $this->assertTrue(new Success(true));
    }

    public function testAssertNullWithoutPromise(): void
    {
        $this->assertNull(null);
    }

    public function testAssertNullWithPromise(): void
    {
        $this->assertNull(new Success(null));
    }

    public function testAssertSameWithoutPromise(): void
    {
        $this->assertSame(1, 1);
    }

    public function testAssertSameWithPromise(): void
    {
        $this->assertSame(1, new Success(1));
    }

    public function testAssertInstanceOfWithoutPromise(): void
    {
        $this->assertInstanceOf(\DateTimeImmutable::class, new \DateTimeImmutable());
    }

    public function testAssertInstanceOfWithPromiseWhenCheckingAgainstPromise(): void
    {
        $this->assertInstanceOf(Promise::class, new Success(new \DateTimeImmutable()));
    }

    public function testAssertInstanceOfWithPromise(): void
    {
        $this->assertInstanceOf(\DateTimeImmutable::class, new Success(new \DateTimeImmutable()));
    }
}
