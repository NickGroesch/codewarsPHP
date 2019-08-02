<?php

function revRot($str, $sz) {
    // sanitize input
    if($sz>strlen($str)){
        return "";
    }
    if($sz<=0){
        return "";
    }
    if($str==""){
        return "";
    }
    $chunks= str_split($str, $sz);
    $processed=[];
    foreach($chunks as $chunk){
        if(testChunk($chunk)){
           array_push($processed, strrev($chunk)); // reverse string
        }else{
            // rotate string
        }
    }
    prettyArray($processed);
    return $chunks;
}
function sum($carry, $new){
    return $carry+=$new;
}
// echo(array_reduce([1,2,3,4], $sum));
function testChunk($chunk){
    // because any integer exponentiation of an integer preserves its parity
    $array= str_split($chunk);
    echo $array;
    $sum = array_reduce($array, "sum");

    // $digits= str_split($chunk);

    // $sum=0;
    // foreach($digits as $digit){

    //     $num= intval($digit);
    //     // $sum+=$num**3;
    // }
    echo "$chunk:$sum\n";
    // return value of true indicates reverse chunk
    if($sum%2==0){return true;}else{return false;}
}

function prettyArray(array $ugly){
    foreach($ugly as $word) {
        echo $word, "\n";
    }
}

prettyArray(revRot("733049910872815764", 4));