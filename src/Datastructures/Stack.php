<?php

namespace Ddm14159\Algo\Datastructures;

use Ddm14159\Algo\Interfaces\IStack;

class Stack implements IStack
{
    private LinkedList $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    /**
     * Checks if the stack is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->list->isEmpty();
    }

    /**
     * Return size of the stack
     *
     * @return int
     */
    public function size(): int
    {
        return $this->list->size();
    }

    /**
     * Added given value to the stack
     *
     * @param mixed $value
     * @return $this
     */
    public function push(mixed $value): Stack
    {
        $this->list->prepend($value);
        return $this;
    }

    /**
     * Deletes top item from the stack and returns its value
     *
     * @return mixed
     * @throws Exception
     */
    public function pop(): mixed
    {
        $popped = $this->peek();
        $this->list->deleteHead();
        return $popped;
    }

    /**
     * Returns value of the top item of the stack
     *
     * @return mixed
     * @throws Exception
     */
    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            throw new Exception('Stack underflow');
        }
        return $this->list->getHead();
    }
}
