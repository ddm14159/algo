<?php

namespace Ddm14159\Algo;

use _PHPStan_ccec86fc8\Nette\Neon\Exception;
use Ddm14159\Algo\Interfaces\IStack;

class Stack implements IStack
{
    private array $data;
    private mixed $last;
    private int $length;

    public function __construct()
    {
        $this->data = [];
        $this->last = null;
        $this->length = 0;
    }

    /**
     * Checks if the stack is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length === 0;
    }

    /**
     * Return size of the stack
     *
     * @return int
     */
    public function size(): int
    {
        return $this->length;
    }

    /**
     * Added given value to the stack
     *
     * @param mixed $value
     * @return $this
     */
    public function push(mixed $value): Stack
    {
        $this->data[] = $value;
        $this->last = $value;
        $this->length++;
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
        $this->last = $this->data[$this->length - 2] ?? null;
        unset($this->data[$this->length - 1]);
        $this->length--;
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
        return $this->last;
    }
}
