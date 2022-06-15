<?php

namespace Ddm14159\Algo;

class BinarySearch
{
    /**
     * Searches item in array using binary search algorithm
     *
     * @param array $data
     * @param mixed $item
     * @return bool
     */
    public static function search(array $data, mixed $item): bool
    {
        if ($data === []) {
            return false;
        }
        $start = 0;
        $end = count($data) - 1;
        while ($start <= $end) {
            $middle = intdiv($end + $start, 2);
            if ($item === $data[$middle]) {
                return true;
            }
            if ($item < $data[$middle]) {
                $end = $middle - 1;
            } else {
                $start = $middle + 1;
            }
        }
        return false;
    }
}
