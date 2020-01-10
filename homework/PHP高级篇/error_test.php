<?php

function getByIndex($arr, $index)
{
    try {
        if ($index < count($arr)){
            return $arr[$index];
        }
        throw new Exception('The index crossing the line');
    } catch (Exception $e) {
        echo "catch exception: $e";
    } catch (Error $e){
        echo "catch error: $e";
    }
}

$a = [1,2,3,4,5];
echo getByIndex($a, 3);
echo PHP_EOL;
echo getByIndex($a, 5);
