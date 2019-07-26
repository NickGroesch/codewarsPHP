<?php

function count_smileys($arr): int {
    $valid=generateSmileys();
    $counter=0;
    foreach($arr as $face){
        foreach($valid as $match){
            if ($face==$match){
                $counter++;
            }
        }
    }
    return $counter;
  }

function generateSmileys():array{
    $eyes= [":",";"];
    $noses= ["","-","~"];
    $mouths= [")","D"];
    $valid=[];
    foreach($eyes as $eye){
        foreach ($noses as $nose) {
            foreach ($mouths as $mouth){
                array_push( $valid, "$eye$nose$mouth");
            }
        }
    }
    return $valid;
}
// function prettyArray(array $ugly){
//     foreach($ugly as $word) {
//         echo $word, "\n";
//     }
// }
// prettyArray(generateSmileys());