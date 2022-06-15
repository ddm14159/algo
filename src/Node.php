<?php

namespace Ddm14159\Algo;

class Node
{
    private mixed $data;
    public ?Node $next;

    public function __construct(mixed $data)
    {
        $this->data = $data;
        $this->next = null;
    }

    /**
     * Returns next node
     *
     * @return Node|null
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * Adds a node as a next one
     *
     * @param Node $next
     * @return void
     */
    public function setNext(Node $next): void
    {
        $this->next = $next;
    }

    /**
     * Deletes next node
     *
     * @return void
     */
    public function unsetNext(): void
    {
        $this->next = null;
    }

    /**
     * Returns value of the node
     *
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->data;
    }
}
