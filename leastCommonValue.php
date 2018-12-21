<?php
/**
 * Least Common Value
 *
 * Finds the minimum intersecting or least common values
 * @param array
 * @param array
 * @return int minimum intersecting value
 */

function leastCommonValue(array $a, array $b) : int {
  return min(array_intersect($a, $b));
}

$a = [3, 7, 1, 6, 3, 1, 7, 4];
$b = [2, 5, 8, 0, 5, 7];

echo leastCommonValue($a, $b); // 7
