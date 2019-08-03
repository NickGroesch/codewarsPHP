<?php

function invite_more_women(array $a): bool {
    $sum = array_reduce($array, "sum");
    $invite= $sum>0?  true:  false;
    return $invite;
}

function sum($carry, $new){
    return $carry+=$new;
}