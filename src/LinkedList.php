<?php

namespace Ddm14159\Algo;

class LinkedList
{
    private ?Node $head = null;

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
            $result[] = "node#{$count}: {$current->getValue()} ->";
            $current = $current->getNext();
        }
        return implode(" ", $result);
    }

    /**
     * Checks if the list is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    /**
     * Return the last node of the list
     *
     * @return Node
     */
    private function getLastNode(): Node
    {
        $current = $this->head;
        while ($current->getNext() !== null) {
            $current = $current->getNext();
        }
        return $current;
    }

    /**
     * Returns value of the last node
     *
     * @return mixed
     */
    public function getLastValue(): mixed
    {
        return $this->getLastNode()->getValue();
    }

    /**
     * Returns value of the first node
     *
     * @return mixed
     */
    public function getFirstValue(): mixed
    {
        return $this->head->getValue();
    }

    /**
     * Checks if the list has given value
     *
     * @param mixed $value
     * @return bool
     */
    public function find(mixed $value): bool
    {
        $current = $this->head;
        while ($current !== null) {
            if ($current->getValue() === $value) {
                return true;
            }
            $current = $current->getNext();
        }
        return false;
    }

    /**
     * Deletes given value from the list
     *
     * @param mixed $value
     * @return LinkedList
     */
    public function delete(mixed $value): LinkedList
    {
        if ($this->head->getValue() === $value) {
            return $this->shift();
        }
        $previous = $this->head;
        $current = $this->head->getNext();
        while ($current !== null) {
            if ($current->getValue() === $value) {
                $previous->setNext($current->getNext());
            }
            $previous = $previous->getNext();
            $current = $current->getNext();
        }
        return $this;
    }

    /**
     * Adds given value to the end of the list
     *
     * @param mixed $value
     * @return $this
     */
    public function push(mixed $value): LinkedList
    {
        $new = new Node($value);
        if ($this->head === null) {
            $this->head = $new;
            return $this;
        }
        $this->getLastNode()->setNext($new);
        return $this;
    }

    /**
     * Deletes the last item of the list
     *
     * @return $this
     */
    public function pop(): LinkedList
    {
        $current = $this->head;
        while ($current->getNext()->getNext() !== null) {
            $current = $current->getNext();
        }
        $current->unsetNext();
        return $this;
    }

    /**
     * Adds given value to the beginning of the list
     *
     * @param mixed $value
     * @return $this
     */
    public function unshift(mixed $value): LinkedList
    {
        $newHead = new Node($value);
        $tmp = $this->head;
        $newHead->setNext($tmp);
        $this->head = $newHead;
        return $this;
    }

    /**
     * Deletes the first item of the list
     *
     * @return $this
     */
    public function shift(): LinkedList
    {
        $this->head = $this->head->getNext();
        return $this;
    }
}
