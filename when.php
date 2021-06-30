<?php

function timeToAgo($time){
    $time=(int)$time;
    $now=time();
    $diff=$now-$time;
    if($diff<60)return 'just now';

    $year=(int)($diff/(365*24*3600));
    $diff=$diff%(365*24*3600);

    $month=(int)($diff/(30*24*3600));
    $diff=$diff%(30*24*3600);

    $week=(int)($diff/(7*24*3600));
    $diff=$diff%(7*24*3600);

    $day=(int)($diff/(24*3600));
    $diff=$diff%(24*3600);

    $hour=(int)($diff/(3600));
    $diff=$diff%(3600);

    $min=(int)($diff/(60));
    $diff=$diff%(60);

    switch(true){
        case ($year === 1)  : return "one year ago"      ; break;
        case ($year > 1)    : return "$year years ago"   ; break;
        case ($month === 1) : return "a month ago"       ; break;
        case ($month > 1)   : return "$month months ago" ; break;
        case ($week === 1)  : return "a week ago"        ; break;
        case ($week > 1)    : return "$week weeks ago"   ; break;
        case ($day === 1)   : return "yesterday"         ; break;
        case ($day > 1)     : return "$day days ago"     ; break;
        case ($hour === 1)  : return "an hour ago"       ; break;
        case ($hour > 1)    : return "$hour hours ago"   ; break;
        case ($min === 1)   : return "one minute ago"    ; break;
        case ($min > 1)     : return "$min minutes ago"  ; break;
    }
}

echo timeToAgo(time())."<br>";
echo timeToAgo(time() + 10)."<br>";
echo timeToAgo(time() - 59)."<br>";
echo timeToAgo(time() - 60)."<br>";
echo timeToAgo(time() - 119)."<br>";
echo timeToAgo(time() - (2 * 60))."<br>";
echo timeToAgo(time() - (59 * 60))."<br>";
echo timeToAgo(time() - (60 * 60) + 1)."<br>";
echo timeToAgo(time() - (60 * 60))."<br>";
echo timeToAgo(time() - (119 * 60))."<br>";
echo timeToAgo(time() - (2 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (2 * 60 * 60))."<br>";
echo timeToAgo(time() - (23 * 60 * 60))."<br>";
echo timeToAgo(time() - (24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (24 * 60 * 60))."<br>";
echo timeToAgo(time() - (2 * 24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (2 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (6 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (7 * 24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (7 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (24 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (29 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (6 * 30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (12 * 30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (365 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (500 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (4 * 365 * 24 * 60 * 60))."<br>";

