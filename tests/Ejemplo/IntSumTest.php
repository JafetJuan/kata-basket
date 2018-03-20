<?php
namespace Kata\Tests\Ejemplo;

use Kata\Ejemplo\FileRepo;
use Kata\Ejemplo\IntSum;
use PHPUnit\Framework\TestCase;

class IntSumTest extends TestCase
{

    public function dataProvider(): array
    {
        return [
            [1, 1, 2],
            [-1, 1, 0],
            [3, 5, 8],
            [-3, -5, -8],
            [-3, 5, 2]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @test
     */
    public function given_operatos_when_execute_add_operation_then_return_succesful_result(
        int $operator1,
        int $operator2,
        int $expectedResult
    ): void {
        $intSum = new IntSum($this->getFileRepoMock());
        $this->assertEquals($expectedResult, $intSum->execute($operator1, $operator2));
    }

    private function getFileRepoMock()
    {
        return new class extends FileRepo {
            public function __construct()
            {
            }

            public function add(int $result): void
            {
            }
        };
    }

}