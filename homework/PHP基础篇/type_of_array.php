<?php

function is_index_array($arr)
{
    if(is_array($arr))
    {
        $keys = array_keys($arr);
        return $keys == array_keys($keys);
    }
    return false;
}

function is_associate_array($arr)
{
    if(is_array($arr))
    {
        $keys = array_keys($arr);
        return $keys != array_keys($keys);
    }
    return false;
}

function bool_to_string($b)
{
    if($b)
    {
        return 'true';
    }
    return 'false';
}

$arr1 = [1,2,3,4,5];
$arr2 = array('name'=>'Jarvis', 'age'=>22, 'sex'=>'male');
echo 'arr1 is an index array: '.bool_to_string(is_index_array($arr1))."\n";
echo 'arr1 is an associate array: '.bool_to_string(is_associate_array($arr1))."\n";
echo 'arr2 is an index array: '.bool_to_string(is_index_array($arr2))."\n";
echo 'arr2 is an associate array: '.bool_to_string(is_associate_array($arr2))."\n";
