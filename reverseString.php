<?php

function reverseString(string $str) : string {
    for($i = 0, $j = strlen($str) - 1; $i < strlen($str) / 2; $i++, $j--) {
        $temp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $temp;
    }
    return $str;
}

echo reverseString('Hello world!'); // !dlrow olleH
