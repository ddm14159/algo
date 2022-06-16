<?php

namespace Ddm14159\Algo\Tests;

use Ddm14159\Algo\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public Queue $queue;

    public function setUp(): void
    {
        parent::setUp();
        $this->queue = new Queue();
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->queue->isEmpty());
    }

    public function testEnqueue()
    {
        $this->queue->enqueue(1);
        $this->assertEquals(1, $this->queue->peek());
    }

    public function testDequeue()
    {
        $this->queue->enqueue(1);
        $popped = $this->queue->dequeue();
        $this->assertEquals(1, $popped);
        $this->assertTrue($this->queue->isEmpty());
    }

    public function testSize()
    {
        $this->queue->enqueue(1);
        $this->assertEquals(1, $this->queue->size());
    }

    public function testQueue()
    {
        $this->queue->enqueue(1);
        $this->queue->enqueue(2);
        $this->queue->enqueue(3);
        $popped = $this->queue->dequeue();
        $this->assertEquals(1, $popped);
        $top = $this->queue->peek();
        $this->assertEquals(2, $top);
    }
}
