<?php
function nOfTriangleByArray($n){
    $a = [];
    $a[0] = array_fill(0, 3, 0);
    $a[0][1] = 1;
    $max = 1;

    for($i = 1; $i < $n; $i++)
    {
        $a[$i] = array_fill(0,  $i + 3, 0);
        for($j = 1; $j < $i + 2; $j++)
        {
            $a[$i][$j] = $a[$i - 1][$j] + $a[$i - 1][$j - 1];
            if ($a[$i][$j] > $max)
            {
                $max = $a[$i][$j];
            }
        }

    }
    display($a, $max);
}

function rJust($str, $len, $fill=' ')
{
    // 字符串填充指定长度
    if(strlen($str) >= $len)
    {
        return $str;
    }
    for($i = 0; $i < $len; $i++)
    {
        $str = $fill.$str;
    }
    return substr($str, strlen($str) - $len, $len);
}

function display($arr, $max)
{
    $len = strlen((string)$max);
    $n = count($arr);
    for($i = 0; $i < $n; $i++)
    {
        for($j = 0; $j < ($n - $i - 1); $j++)
        {
            echo rJust('', (int)($len + 1)/2);
        }
        for($j = 1; $j < $i + 2; $j++)
        {
            echo rJust((string)$arr[$i][$j], $len+1);
        }
        echo PHP_EOL;
    }
}

nOfTriangleByArray(7);
