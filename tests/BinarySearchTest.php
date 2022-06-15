<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public array $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [1, 4, 8, 11, 12];
    }
    public function testSearchEmpty()
    {
        $item = 4;
        $this->assertFalse(BinarySearch::search([], $item));
    }

    public function testSearchTrue()
    {
        $item = 4;
        $this->assertTrue(BinarySearch::search($this->data, $item));
    }

    public function testSearchFalse()
    {
        $item = 3;
        $this->assertFalse(BinarySearch::search($this->data, $item));
    }
}
