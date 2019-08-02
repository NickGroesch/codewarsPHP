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
    if(strlen($chunks[count($chunks)-1])<$sz){array_pop($chunks);}
    $processed=[];
    foreach($chunks as $chunk){
        if(testChunk($chunk)){// reverse string
            array_push($processed, strrev($chunk)); 
        }else{// rotate string
            $local= str_split($chunk);
            $rotate=array_shift($local);
            array_push($local, $rotate);
            array_push($processed, implode("", $local));
        }
    }
    // prettyArray($processed);
    return implode("",$processed);
}
function sum($carry, $new){
    return $carry+=$new;
}
// echo(array_reduce([1,2,3,4], $sum));
function testChunk($chunk){
    // because any integer exponentiation of an integer preserves its parity
    $array= str_split($chunk);
    // echo $array;
    $sum = array_reduce($array, "sum");
    // echo "$chunk:$sum\n";
    // return value of true indicates reverse chunk
    if($sum%2==0){return true;}else{return false;}
}

function prettyArray(array $ugly){
    foreach($ugly as $word) {
        echo $word, "\n";
    }
}

// prettyArray(revRot("733049910872815764", 4));
echo (revRot("733049910872815764", 4));