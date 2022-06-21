<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\Datastructures\LinkedList;
use PHPUnit\Framework\TestCase;

class LinkerListTest extends TestCase
{
    public LinkedList $list;

    public function setUp(): void
    {
        parent::setUp();
        $this->list = new LinkedList();
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->list->isEmpty());
    }

    public function testToArrayEmpty()
    {
        $expected = [];
        $this->assertEquals($expected, $this->list->toArray());
    }

    public function testToArray()
    {
        $expected = [2, 1];
        $this->list->prepend(1)->prepend(2);
        $this->assertEquals($expected, $this->list->toArray());
    }

    public function testPrepend()
    {
        $this->list->prepend(1)->prepend(2);
        $this->assertEquals(2, $this->list->getHead());
    }

    public function testAppend()
    {
        $this->list->append(1)->append(2);
        $this->assertEquals(1, $this->list->getHead());
    }

    public function providerTestInsert()
    {
        return [
            [-1, [3, 1, 2]],
            [0, [3, 1, 2]],
            [1, [3, 1, 2]],
            [2, [1, 3, 2]],
            [3, [1, 2, 3]],
            [4, [1, 2, 3]],
        ];
    }

    /**
     * @dataProvider providerTestInsert
     */
    public function testInsert($index, $expected)
    {
        $this->list->append(1)->append(2);
        $this->list->insert(3, $index);
        $this->assertEquals($expected, $this->list->toArray());
    }

    public function providerTestDelete()
    {
        return [
            [1, [2, 3]],
            [2, [1, 3]],
            [3, [1, 2]],
        ];
    }

    /**
     * @dataProvider providerTestDelete
     */
    public function testDelete($value, $expected)
    {
        $this->list->append(1)
            ->append(2)
            ->append(3)
            ->delete($value);
        $this->assertEquals($expected, $this->list->toArray());
    }

    public function testReverse()
    {
        $this->list->append(1)->append(2)->append(3);
        $expected = [3, 2, 1];
        $this->assertEquals($expected, $this->list->reverse()->toArray());
    }
}
