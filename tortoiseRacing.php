<?php

function race($v1, $v2, $g) {
    $diff= $v2-$v1;
    $decTime=$g/$diff;
    if ($decTime<=0){return null;}
    $seconds= 3600*$decTime;
    $hours= floor($decTime);
    $seconds -= $hours*3600;
    $minutes= floor($seconds/60);
    $seconds -= $minutes *60;
    $seconds= floor($seconds);
    return [$hours, $minutes, $seconds];
}
echo race(750,850,70);