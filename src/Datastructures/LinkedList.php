<?php

namespace Ddm14159\Algo\Datastructures;

class LinkedList
{
    private ?Node $head;
    private ?Node $tail;
    private int $length;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->length = 0;
    }

    /**
     * Checks if the list is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length === 0;
    }

    /**
     * Adds new item to the beginning of the list
     *
     * @param mixed $value
     * @return $this
     */
    public function prepend(mixed $value): LinkedList
    {
        $new = new Node($value, $this->head);
        $this->head = $new;
        $this->tail = $this->tail ?? $new;
        $this->length++;
        return $this;
    }

    /**
     * Adds new item to the end of the list
     *
     * @param mixed $value
     * @return $this
     */
    public function append(mixed $value): LinkedList
    {
        $new = new Node($value);
        if ($this->isEmpty()) {
            $this->head = $new;
            $this->tail = $new;
        } else {
            $this->tail->next = $new;
            $this->tail = $this->tail->next;
        }
        $this->length++;
        return $this;
    }

    /**
     * Inserts a new item into the given position in the list
     *
     * @param mixed $value
     * @param int $index
     * @return $this
     */
    public function insert(mixed $value, int $index): LinkedList
    {
        if ($index <= 1) {
            return $this->prepend($value);
        }
        if ($index > $this->length) {
            return $this->append($value);
        }
        $current = $this->head;
        for ($i = 1; $i < $index - 1; $i++) {
            $current = $current->next;
        }
        $new = new Node($value);
        $new->next = $current->next;
        $current->next = $new;
        $this->length++;
        return $this;
    }

    /**
     * Removes an item with given value from the list
     *
     * @param mixed $value
     * @return $this
     */
    public function delete(mixed $value): LinkedList
    {
        $count = 0;
        if ($this->head->value === $value) {
            $this->head = $this->head->next;
            $count++;
        }
        $current = $this->head;
        while ($current?->next !== null) {
            if ($current->next->value === $value) {
                $current->next = $current->next->next;
                $count++;
            }
            $current = $current->next;
        }
        $this->length -= $count;
        return $this;
    }

    /**
     * Removes the first item of the list
     *
     * @return $this
     */
    public function deleteHead(): LinkedList
    {
        $this->head = $this->head->next;
        $this->length--;
        return $this;
    }

    /**
     * Return the value of the head item of the list
     *
     * @return mixed
     */
    public function getHead(): mixed
    {
        return $this->head->value;
    }

    /**
     * Returns size of the list
     *
     * @return int
     */
    public function size(): int
    {
        return $this->length;
    }

    /**
     * Reverses the list
     *
     * @return $this
     */
    public function reverse(): LinkedList
    {
        $previous = null;
        $current = $this->head;
        while ($current !== null) {
            $next = $current->next;
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }
        $this->tail = $this->head;
        $this->head = $previous;
        return $this;
    }

    /**
     * Makes the list available to be printed
     *
     * @return string
     */
    public function __toString(): string
    {
        $result = ["\n"];
        $count = 0;
        $current = $this->head;
        while ($current !== null) {
            $count++;
            $result[] = "({$count}): {$current->value} ->";
            $current = $current->next;
        }
        return implode(" ", $result);
    }

    /**
     * Turns the list into array
     *
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        $current = $this->head;
        for ($i = 0; $i < $this->length; $i++) {
            $result[] = $current->value;
            $current = $current->next;
        }
        return $result;
    }
}
