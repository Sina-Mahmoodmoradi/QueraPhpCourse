<?php

/*function fib($n)
{
    $arr=[];

    for($i = 0; $i < $n;$i++) {
        if ($i == 0){
            $arr[]=1;
            yield 1;
        }
        elseif ($i == 1){
            $arr[]=1;
            yield 1;
        }else{
            $arr[]=$arr[$i-1]+$arr[$i-2];
            yield $arr[$i];
        }
    }
}*/
function fib($n)
{
    $k=1;
    $j=0;
    yield 1;
    for ($i=1;$i<$n;$i++) {
        $k=$k+$j;
        $j=$k-$j;
        yield $k;
    }
}

foreach (fib(6) as $number) {
    echo $number . "<br>";
}