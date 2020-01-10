<?php

function xrange($start, $end, $step=1){
    for ($i = $start; $i < $end; $i += $step){
        yield $i;
    }
}

foreach(xrange(1, 11) as $num){
    echo $num, PHP_EOL;
}
