<?php

$date1=strtotime("12 oct 2018");
$date2=strtotime(readline());
$diff=($date2-$date1)/(3600*24);
echo $diff<0?'gone':$diff;