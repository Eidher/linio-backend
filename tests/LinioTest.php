<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Linio
 */
final class LinioTest extends TestCase
{
    public function testCanBeCreatedFromArray(): void
    {
        $this->assertInstanceOf(
            Linio::class,
            new Linio([2 => 'Test', 3 => 'tester'], 'unit')
        );
    }

    public function testCannotPassZeroAsKeyOnConstructor(): void
    {
        $this->expectException(DivisionByZeroError::class);

        (new Linio([0 => 'Test', '4' => 'tester'], 'unit'))->execute();
    }

    public function testCannotPassSecondParameterNonString(): void
    {
        $this->expectException(TypeError::class);

        (new Linio([0 => 'Test', '4' => 'tester'], 4))->execute();
    }

    public function testExpectArray(): void
    {
        $values = [ 3 => 'Linio', 5 => 'IT' ];
        $result = ( new Linio($values, 'Linianos') )->execute();

        $this->assertEquals(
            array ( 1 => 1, 2 => 2, 3 => 'Linio', 4 => 4, 5 => 'IT', 6 => 'Linio', 7 => 7, 8 => 8, 9 => 'Linio', 10 => 'IT', 11 => 11, 12 => 'Linio', 13 => 13, 14 => 14, 15 => 'Linianos', 16 => 16, 17 => 17, 18 => 'Linio', 19 => 19, 20 => 'IT', 21 => 'Linio', 22 => 22, 23 => 23, 24 => 'Linio', 25 => 'IT', 26 => 26, 27 => 'Linio', 28 => 28, 29 => 29, 30 => 'Linianos', 31 => 31, 32 => 32, 33 => 'Linio', 34 => 34, 35 => 'IT', 36 => 'Linio', 37 => 37, 38 => 38, 39 => 'Linio', 40 => 'IT', 41 => 41, 42 => 'Linio', 43 => 43, 44 => 44, 45 => 'Linianos', 46 => 46, 47 => 47, 48 => 'Linio', 49 => 49, 50 => 'IT', 51 => 'Linio', 52 => 52, 53 => 53, 54 => 'Linio', 55 => 'IT', 56 => 56, 57 => 'Linio', 58 => 58, 59 => 59, 60 => 'Linianos', 61 => 61, 62 => 62, 63 => 'Linio', 64 => 64, 65 => 'IT', 66 => 'Linio', 67 => 67, 68 => 68, 69 => 'Linio', 70 => 'IT', 71 => 71, 72 => 'Linio', 73 => 73, 74 => 74, 75 => 'Linianos', 76 => 76, 77 => 77, 78 => 'Linio', 79 => 79, 80 => 'IT', 81 => 'Linio', 82 => 82, 83 => 83, 84 => 'Linio', 85 => 'IT', 86 => 86, 87 => 'Linio', 88 => 88, 89 => 89, 90 => 'Linianos', 91 => 91, 92 => 92, 93 => 'Linio', 94 => 94, 95 => 'IT', 96 => 'Linio', 97 => 97, 98 => 98, 99 => 'Linio', 100 => 'IT' ),
            $result
        );
    }
}