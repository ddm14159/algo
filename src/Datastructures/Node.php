<?php

namespace Ddm14159\Algo\Datastructures;

class Node
{
    public mixed $value;
    public ?Node $next;

    public function __construct(mixed $value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}
