<?php

namespace Ddm14159\Algo\Datastructures;

use Ddm14159\Algo\Interfaces\IQueue;

class Queue implements IQueue
{
    private array $data;
    private mixed $first;
    private mixed $last;
    private int $length;

    public function __construct()
    {
        $this->data = [];
        $this->first = null;
        $this->last = null;
        $this->length = 0;
    }

    /**
     * Checks if the queue is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length === 0;
    }

    /**
     * Return size of the queue
     *
     * @return int
     */
    public function size(): int
    {
        return $this->length;
    }

    /**
     * Added given value to the queue
     *
     * @param mixed $value
     * @return $this
     */
    public function enqueue(mixed $value): Queue
    {
        if ($this->size() === 0) {
            $this->first = $value;
        }
        $this->data[] = $value;
        $this->last = $value;
        $this->length++;
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
        $item = $this->peek();
        $this->first = $this->data[1] ?? null;
        $this->data = array_slice($this->data, 1);
        $this->length--;
        return $item;
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
        return $this->first;
    }
}
