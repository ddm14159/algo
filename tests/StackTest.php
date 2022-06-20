<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\Datastructures\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public Stack $stack;

    public function setUp(): void
    {
        parent::setUp();
        $this->stack = new Stack();
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->stack->isEmpty());
    }

    public function testPush()
    {
        $this->stack->push(1);
        $this->assertEquals(1, $this->stack->peek());
    }

    public function testPop()
    {
        $this->stack->push(1);
        $popped = $this->stack->pop();
        $this->assertEquals(1, $popped);
        $this->assertTrue($this->stack->isEmpty());
    }

    public function testSize()
    {
        $this->stack->push(1);
        $this->assertEquals(1, $this->stack->size());
    }

    public function testStack()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $popped = $this->stack->pop();
        $this->assertEquals(3, $popped);
        $top = $this->stack->peek();
        $this->assertEquals(2, $top);
    }
}
