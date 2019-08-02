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
    foreach($chunks as $chunk){
        testChunk($chunk);
    }
    return $chunks;
}

function testChunk($chunk){
    $digits= str_split($chunk);
    $sum=0;
    foreach($digits as $digit){
        $num= intval($digit);
        $sum+=$num**2;
    }
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