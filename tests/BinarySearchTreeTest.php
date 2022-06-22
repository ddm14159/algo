<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\Datastructures\BinarySearchTree;
use PHPUnit\Framework\TestCase;

class BinarySearchTreeTest extends TestCase
{
    public BinarySearchTree $tree;

    public function setUp(): void
    {
        parent::setUp();
        $this->tree = new BinarySearchTree(0);
        $data = [1, -5, 8, 4, -6, 9, 3, -2];
        array_walk($data, fn($item) => $this->tree->insert($item));
    }

    public function testDepthOutput()
    {
        $expected = [0, -5, -6, -2, 1, 8, 4, 3, 9];
        $this->assertEquals($expected, $this->tree->depthOutput());
    }

    public function testWidthOutput()
    {
        $expected = [0, -5, 1, -6, -2, 8, 4, 9, 3];
        $this->assertEquals($expected, $this->tree->widthOutput());
    }

    public function testDeleteOutput()
    {
        $this->tree->delete(4);
        $expected = [0, -5, 1, -6, -2, 8, 3, 9];
        $this->assertEquals($expected, $this->tree->widthOutput());
        $this->tree->delete(-2);
        $expected = [0, -5, 1, -6, 8, 3, 9];
        $this->assertEquals($expected, $this->tree->widthOutput());
    }
}
