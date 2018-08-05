<?php
/**
 * Find First Non-Repeating Character
 *
 * Function which finds the first non-repeating character in a string
 * @param string $str the string
 * @return string $str the first non-repeating character
 */

function findFirstNonRepeatingChar($str) {
    $store = [];
    
    for ($i = 0; $i !== strlen($str) - 1; $i++) {
        for ($j = $i + 1; $j !== strlen($str) - 1; $j++) {
            if ($str[$i] === $str[$j]) {
                $store[] = $str[$i];
            }
        }
    }

    for ($k = 0; $k !== strlen($str) - 1; $k++) {
        if (!in_array($str[$k], $store)) {
            return $str[$k];
        }   
    }
}

echo findFirstNonRepeatingChar('stress'); // t
