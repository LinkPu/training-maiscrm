<?php

$a = array_fill(0,5,0);
$l = count($a);
for ($i=0; $i < $l; $i++) {
    $a[$i] = array_fill(0,$i,$i);
}

function extract_col($arr, $index)
{
    $result = [];
    foreach ($arr as $value1) {
        $i = 0;
        foreach ($value1 as $value2) {
            if($i == $index)
            {
                array_push($result, $value2);
            }
            $i++;
        }
    }
    if($result == []){
        return null;
    }
    return $result;

}

function null_to_string($v)
{
    if($v == null){
        return "null";
    }
    return $v;
}

print_r($a);
print_r(null_to_string(extract_col($a, 0)));
print_r(null_to_string(extract_col($a, 1)));
print_r(null_to_string(extract_col($a, 2)));
print_r(null_to_string(extract_col($a, 3)));
print_r(null_to_string(extract_col($a, 4)));
print_r(null_to_string(extract_col($a, 5)));
