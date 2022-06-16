<?php

namespace Ddm14159\Algo\Interfaces;

interface IStack
{
    public function isEmpty(): bool;
    public function push(mixed $value): IStack;
    public function pop(): mixed;
    public function top(): mixed;
}
