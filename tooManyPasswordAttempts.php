<?php
/**
 * Too Many Password Attempts
 *
 *
 * @param string $password a string of the valid password
 * @param array $attempts an array of attempted passwords
 * @param int $limit integer representing maximimum incorrect password attemts
 * @return bool false if $failed_attempts is greater than or equal to $limit
 */

function tooManyPasswordAttempts(string $password, array $attempts, int $limit = 10) : bool {
    $failed_attempts = 0;
    foreach ($attempts as $attempt) {
        if ($attempt === $password) {
            $failed_attempts = 0;
            continue;
        }
        $failed_attempts++;
        if ($failed_attempts >= $limit) {
            return true;
        }
    }
    return false; 
}
