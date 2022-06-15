<?php

namespace Ddm14159\Algo;

class Sort
{
    /**
     * Finds index of minimal item in array
     *
     * @param array $data
     * @return mixed
     */
    private static function findMinIndex(array $data): mixed
    {
        $indexes = array_keys($data);
        return array_reduce($indexes, function ($acc, $item) use ($data) {
            return $data[$item] < $data[$acc] ? $item : $acc;
        }, $indexes[0]);
    }

    /**
     * Sorts array using selection sort algorithm
     *
     * @param array $data
     * @return array
     */
    public static function selection(array $data): array
    {
        $result = [];
        $length = count($data);
        for ($i = 0; $i < $length; $i++) {
            $minIndex = self::findMinIndex($data);
            $result[] = $data[$minIndex];
            unset($data[$minIndex]);
        }
        return $result;
    }

    /**
     * Merges two arrays into a sorted one
     *
     * @param array $leftData
     * @param array $rightData
     * @return array
     */
    private static function unite(array $leftData, array $rightData): array
    {
        $leftIndex = 0;
        $rightIndex = 0;
        $result = [];
        $leftLength = count($leftData);
        $rightLength = count($rightData);
        while ($leftIndex < $leftLength && $rightIndex < $rightLength) {
            if ($leftData[$leftIndex] < $rightData[$rightIndex]) {
                $result[] = $leftData[$leftIndex];
                $leftIndex++;
            } else {
                $result[] = $rightData[$rightIndex];
                $rightIndex++;
            }
        }

        $leftRemainder = array_slice($leftData, $leftIndex);
        $rightRemainder = array_slice($rightData, $rightIndex);
        return array_merge($result, $leftRemainder, $rightRemainder);
    }

    /**
     * Sorts array using merge sort algorithm
     *
     * @param array $data
     * @return array
     */
    public static function merge(array $data): array
    {
        $length = count($data);
        if ($length <= 1) {
            return $data;
        }
        $middleIndex = intdiv($length, 2);
        $leftData = array_slice($data, 0, $middleIndex);
        $rightData = array_slice($data, $middleIndex);
        $mergedLeftData = self::merge($leftData);
        $mergedRightData = self::merge($rightData);
        return self::unite($mergedLeftData, $mergedRightData);
    }
}
