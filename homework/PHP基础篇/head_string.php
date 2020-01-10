<?php

function is_start_with($originStr, $prefixStr, $sensitive=true)
{
    $newStr = substr($originStr, 0, strlen($prefixStr));
    if($sensitive)
    {
        return $newStr == $prefixStr;
    }
    else
    {
        return strtolower($newStr) == strtolower($prefixStr);
    }
}
$testStr = 'Abcdefg';
$prefixStr = 'abc';
echo var_dump(is_start_with($testStr, $prefixStr));
echo var_dump(is_start_with($testStr, $prefixStr, false));
