<?php

namespace Ddm14159\Algo\Datastructures;

use Ddm14159\Algo\Interfaces\IQueue;

class Queue implements IQueue
{
    private LinkedList $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    /**
     * Checks if the queue is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->list->isEmpty();
    }

    /**
     * Return size of the queue
     *
     * @return int
     */
    public function size(): int
    {
        return $this->list->size();
    }

    /**
     * Added given value to the queue
     *
     * @param mixed $value
     * @return $this
     */
    public function enqueue(mixed $value): Queue
    {
        $this->list->append($value);
        return $this;
    }

    /**
     * Deletes the first item from the queue and returns its value
     *
     * @return mixed
     * @throws Exception
     */
    public function dequeue(): mixed
    {
        $dequeued = $this->peek();
        $this->list->deleteHead();
        return $dequeued;
    }

    /**
     * Returns value of the first item of the queue
     *
     * @return mixed
     * @throws Exception
     */
    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            throw new Exception('Queue underflow');
        }
        return $this->list->getHead();
    }
}
