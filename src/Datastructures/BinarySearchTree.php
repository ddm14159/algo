<?php

namespace Ddm14159\Algo\Datastructures;

class BinarySearchTree
{
    private mixed $value;
    private ?BinarySearchTree $parent;
    private ?BinarySearchTree $left;
    private ?BinarySearchTree $right;

    public function __construct(mixed $rootValue)
    {
        $this->value = $rootValue;
        $this->parent = null;
        $this->left = null;
        $this->right = null;
    }

    /**
     * Inserts a given value into the tree
     *
     * @param mixed $newValue
     * @return $this
     */
    public function insert(mixed $newValue): BinarySearchTree
    {
        $new = new BinarySearchTree($newValue);
        $new->parent = $this;
        if ($this->value > $newValue) {
            $this->left === null ?  $this->left = $new : $this->left->insert($newValue);
        } else {
             $this->right === null ? $this->right = $new : $this->right->insert($newValue);
        }
        return $this;
    }

    /**
     * Finds a node, containing given value
     *
     * @param mixed $value
     * @return $this
     */
    public function find(mixed $value): BinarySearchTree
    {
        if ($this->value === $value) {
            return $this;
        } elseif ($this->value > $value && $this->left !== null) {
            return $this->left->find($value);
        } elseif ($this->value < $value && $this->right !== null) {
            return $this->right->find($value);
        }
        throw new Exception("Couldn't find such item");
    }

    /**
     * Returns the min value in the tree
     *
     * @return $this
     */
    public function findMin(): BinarySearchTree
    {
        if ($this->left === null) {
            return $this;
        }
        return $this->left->findMin();
    }

    /**
     * Deletes given value from the tree
     *
     * @param mixed $value
     * @return $this
     */
    public function delete(mixed $value): BinarySearchTree
    {
        $subTree = $this->find($value);
        $parent = $subTree->parent;
        if ($subTree->left === null && $subTree->right === null) {
            if ($parent->left->value === $value) {
                $parent->left = null;
            } else {
                $parent->right = null;
            }
        } elseif ($subTree->left === null) {
            if ($parent->left->value === $value) {
                $parent->left = $subTree->right;
            } else {
                $parent->right = $subTree->right;
            }
            $subTree->right->parent = $parent;
        } elseif ($subTree->right === null) {
            if ($parent->left->value === $value) {
                $parent->left = $subTree->left;
            } else {
                $parent->right = $subTree->left;
            }
            $subTree->left->parent = $parent;
        } else {
            $min = $subTree->findMin();
            $min->left = $subTree->left;
            $min->right = $subTree->right;
            $min->parent = $subTree->parent;
            if ($parent->left->value === $value) {
                $parent->left = $min;
            } else {
                $parent->right = $min;
            }
        }
        return $this;
    }

    /**
     * Returns an array with all the values of the tree using depth walk
     *
     * @return array
     */
    public function depthOutput(): array
    {
        $values = [];
        $stack = new Stack();
        $stack->push($this);
        while (!$stack->isEmpty()) {
            $node = $stack->peek();
            $values[] = $node->value;
            $stack->pop();
            if ($node->right !== null) {
                $stack->push($node->right);
            }
            if ($node->left !== null) {
                $stack->push($node->left);
            }
        }
        return $values;
    }

    /**
     * Returns an array with all the values of the tree using width walk
     *
     * @return array
     */
    public function widthOutput(): array
    {
        $values = [];
        $queue = new Queue();
        $queue->enqueue($this);
        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $values[] = $current->value;
            if ($current->left !== null) {
                $queue->enqueue($current->left);
            }
            if ($current->right !== null) {
                $queue->enqueue($current->right);
            }
        }
        return $values;
    }
}
