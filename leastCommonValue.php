<?php
/**
 * Least Common Value
 *
 * Finds the minimum intersecting values
 * or the least common values
 * @param array
 * @param array
 */

function leastCommonValue($a, $b) {
  return min(array_intersect($a, $b));
}

$a = [3, 7, 1, 6, 3, 1, 7, 4];
$b = [2, 5, 8, 0, 5, 7];

echo leastCommonValue($a, $b); // 7
