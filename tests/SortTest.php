<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\Sort;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public array $data;
    public array $expected;

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [1, 11, 8, 12, 4, 9, 3];
        $this->expected = [1, 3, 4, 8, 9, 11, 12];
    }

    public function testSelectionEmpty()
    {
        $sorted = Sort::selection([]);
        $this->assertEquals([], $sorted);
    }

    public function testSelectionTrue()
    {
        $sorted = Sort::selection($this->data);
        $this->assertEquals($this->expected, $sorted);
    }

    public function testMergeEmpty()
    {
        $sorted = Sort::merge([]);
        $this->assertEquals([], $sorted);
    }

    public function testMergeTrue()
    {
        $sorted = Sort::merge($this->data);
        $this->assertEquals($this->expected, $sorted);
    }

    public function testQuickEmpty()
    {
        $sorted = Sort::quick([]);
        $this->assertEquals([], $sorted);
    }

    public function testQuickTrue()
    {
        $sorted = Sort::quick($this->data);
        $this->assertEquals($this->expected, $sorted);
    }
}
