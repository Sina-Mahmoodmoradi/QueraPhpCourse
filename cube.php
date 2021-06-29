<?php

//my answer
function color(&$c)
{
    $h = count($c);
    $l = count($c[0]);
    $w = count($c[0][0]);
    foreach ($c as &$a) {
        foreach ($a as &$b) {
            foreach ($b as &$d) {
                $d = 1;
            }
        }
    }
    for ($i = 1; $i < $h - 1; $i++) {
        for ($j = 1; $j < $l - 1; $j++) {
            for ($e = 1; $e < $w - 1; $e++) {
                $c[$i][$j][$e] = 0;
            }
        }
    }
}

//quera answer
function color(&$ls)
{
    foreach ($ls as $xs => $xl) {
        foreach ($xl as $ys => $yl) {
            foreach ($yl as $zs => $cell) {
                $ls[$xs][$ys][$zs] = (int)($xs == 0 || $xs == count($ls) - 1 || $ys == 0 || $ys == count($xl) - 1 or $zs == 0 or $zs == count($yl) - 1);
            }
        }
    }
}
