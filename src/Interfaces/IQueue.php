<?php

namespace Ddm14159\Algo\Interfaces;

interface IQueue
{
    public function isEmpty(): bool;
    public function size(): int;
    public function enqueue(mixed $value): IQueue;
    public function dequeue(): mixed;
    public function peek(): mixed;
}
