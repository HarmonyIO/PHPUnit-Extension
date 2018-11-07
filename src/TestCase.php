<?php declare(strict_types=1);

namespace HarmonyIO\PHPUnitExtension;

use Amp\Promise;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use function Amp\Promise\wait;

class TestCase extends PHPUnitTestCase
{
    /**
     * Asserts that an array has a specified key.
     *
     * @param int|string                 $key
     * @param mixed[]|\ArrayAccess|Promise $array
     */
    public static function assertArrayHasKey($key, $array, string $message = ''): void
    {
        parent::assertArrayHasKey($key, static::unWrapPromise($array), $message);
    }

    /**
     * Asserts that an array does not have a specified key.
     *
     * @param int|string                 $key
     * @param mixed[]|\ArrayAccess|Promise $array
     */
    public static function assertArrayNotHasKey($key, $array, string $message = ''): void
    {
        parent::assertArrayNotHasKey($key, static::unWrapPromise($array), $message);
    }

    /**
     * @param \Countable|mixed[]|Promise $haystack
     */
    public static function assertCount(int $expectedCount, $haystack, string $message = ''): void
    {
        parent::assertCount($expectedCount, static::unWrapPromise($haystack), $message);
    }

    /**
     * @param mixed $expected
     * @param mixed $actual
     */
    public static function assertEquals($expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        parent::assertEquals($expected, static::unWrapPromise($actual), $message, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    /**
     * @param mixed $condition
     */
    public static function assertTrue($condition, string $message = ''): void
    {
        parent::assertTrue(static::unWrapPromise($condition), $message);
    }

    /**
     * @param mixed $condition
     */
    public static function assertFalse($condition, string $message = ''): void
    {
        parent::assertFalse(static::unWrapPromise($condition), $message);
    }

    /**
     * @param mixed $condition
     */
    public static function assertNull($condition, string $message = ''): void
    {
        parent::assertNull(static::unWrapPromise($condition), $message);
    }

    /**
     * @param mixed $expected
     * @param mixed $actual
     */
    public static function assertSame($expected, $actual, string $message = ''): void
    {
        parent::assertEquals($expected, static::unWrapPromise($actual), $message);
    }

    /**
     * @param mixed $actual
     */
    public static function assertInstanceOf(string $expected, $actual, string $message = ''): void
    {
        if (!is_a($expected, Promise::class, true)) {
            $actual = static::unWrapPromise($actual);
        }

        parent::assertInstanceOf($expected, $actual, $message);
    }

    /**
     * @param mixed $condition
     * @return mixed
     */
    private static function unWrapPromise($condition)
    {
        if ($condition instanceof Promise) {
            return wait($condition);
        }

        return $condition;
    }
}
