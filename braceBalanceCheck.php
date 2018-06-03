<?php

function braceBalanceCheck(array $values): array {
    for ($i = 0; $i <= count($values) - 1; $i++) {
        $braces = str_split($values[$i]);
	$values[$i] = isValid($braces);
    }
    return $values;
}


function isValid(array $braces) : string {
    $available = ['{' => '}', '(' => ')', '[' => ']'];
    $opened = [];
    $closed = [];
    for ($i = 0; $i <= count($braces) - 1; $i++) {
        if (in_array($braces[$i], array_keys($available))) {
            $opened[] = $braces[$i];
            continue;
	}
        $closed[] = $braces[$i];
    }
    return match($braces, $available, $opened, $closed);
}


function match(array $braces, array $available, array $opened, array $closed) : string {
    $last_open = $opened[count($opened) - 1];
    $opened = array_values($opened);
    $closed = array_values($closed);
    if (!testValidity($braces, $available, $last_open, $opened, $closed)) {
        return 'NO';
    }
    if (count($opened) > 1) {
        $result = match($braces, $available, array_slice($opened, 0, -1) , array_slice($closed, 1));
    }
    return 'YES';
}


function testValidity(array $braces, array $available, string $last_open, array $opened, array $closed) : bool {
    // Check for unopened braces 
    $is_opened = in_array(
        array_flip($available)[$closed[0]], 
        array_slice($braces, 0, array_search($closed[0], $braces)) 
    ); 
    if (!$is_opened) { 
        return false; 
    } 
    // check if not nested properly 
    if ($available[$last_open] !== $closed[0]) { 
        // check if consecutive 
        if ($available[$opened[0]] === $closed[0]) { 
            return true; 
        } 
        return false; 
    } 
    // check if not consecutive 
    if ($available[$opened[0]] !== $closed[0]) { 
        // check if nested properly 
        if ($available[$last_open] === $closed[0]) { 
            return true; 
        } 
        return false; 
    } 
    return true; 
} 

$example_values = ['{[()]}', '{[(]}', '{}()[]', '{]}[']; // YES, NO, YES, NO 
var_dump(braceBalanceCheck($example_values));
