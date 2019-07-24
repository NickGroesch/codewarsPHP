<?php

function inArray($array1, $array2):array {
   $result=[];
   foreach($array1 as $regex){
        foreach($array2 as $word){
            $regstr= strval($regex);
            if(strpos($word, $regstr)){
                array_push($result, $regstr);
                break;
            }
        }
   }
   (sort($result));
   return $result;
}

function prettyArray(array $ugly){
    foreach($ugly as $word) {
        echo $word, "\n";
    }
}

// prettyArray( inArray(['a','e','i','o','u'], ['cat', 'hat', 'hut']) );
prettyArray( inArray(["arp", "live", "strong"],  ["lively", "alive", "harp", "sharp", "armstrong"]) );