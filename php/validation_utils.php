<?php
function isEmptyPassword($password) {
    return strlen($password) == 0;
}

function isSamePassword($password, $conf_password) {
    return strcmp($password, $conf_password) == 0;
}

function isValidPassword($password) {
    define("MIN_DIGITS", "1");
    define("MIN_LOWERL", "3");
    define("MIN_UPPERL", "3");
    define("MIN_MARKS", "1");
    
    $digits = 0;
    $lower_letters = 0;
    $upper_letters = 0;
    $marks = 0;

    foreach (str_split($password) as $letter) {
        if ($letter >= 'a' && $letter <= 'z')
            $lower_letters++;
        if ($letter >= 'A' && $letter <= 'Z')
            $upper_letters++;
        if ($letter >= '0' && $letter <= '9')
            $digits++;
        if ($letter == '@' || $letter == '#')
            $marks++;
    }
    
    return $digits >= MIN_DIGITS &&
            $lower_letters >= MIN_LOWERL &&
            $upper_letters >= MIN_UPPERL &&
            $marks >= MIN_MARKS;
}

function isValidPhoneNumber($phoneNum) {
    $mask = "/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/";
    return preg_match($mask, $phoneNum);
}

function hashString($str) {
    settype($str, "string");
    $patterns = array();
    $patterns[] = '/@/';
    $patterns[] = '/#/';
    $patterns[] = '/\$/';
    $replacements = array();
    $replacements[] = '#';
    $replacements[] = '$';
    $replacements[] = '@';

    return crc32(preg_replace($patterns, $replacements, $str));
}

?>