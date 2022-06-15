<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\ListADT;
use PHPUnit\Framework\TestCase;

class ListADTTest extends TestCase
{
    public ListADT $list;

    public function setUp(): void
    {
        parent::setUp();
        $this->list = new ListADT();
        $this->list->push(1);
        $this->list->push(2);
    }

    public function testIsEmpty()
    {
        $this->assertFalse($this->list->isEmpty());
    }

    public function testGetLastValue()
    {
        $this->assertEquals(2, $this->list->getLastValue());
    }

    public function testGetFirstValue()
    {
        $this->assertEquals(1, $this->list->getFirstValue());
    }

    public function testPush()
    {
        $this->list->push(3);
        $this->assertEquals(3, $this->list->getLastValue());
    }

    public function testPop()
    {
        $this->list->pop();
        $this->assertEquals(1, $this->list->getLastValue());
    }

    public function testUnshift()
    {
        $this->list->unshift(5);
        $this->assertEquals(5, $this->list->getFirstValue());
    }

    public function testShift()
    {
        $this->list->shift();
        $this->assertEquals(2, $this->list->getFirstValue());
    }

    public function testFind()
    {
        $this->assertTrue($this->list->find(2));
    }
}
