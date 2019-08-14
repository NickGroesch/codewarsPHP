<?php

function inArray($array1, $array2):array {
   $result=[];
   foreach($array1 as $regex){
        foreach($array2 as $word){
            $regstr= strval($regex);
            echo "$regstr $word \n";
            if(-1<strpos(($word), $regstr)){
                array_push($result, $regstr);
                break;
            }
        }
   }
   (sort($result));
   return $result;
}

function prettyArray(array $ugly , $name="PRETTY_ARRAY"){
    echo "$name\n";
    foreach($ugly as $word) {
        echo $word, "\n";
    }
}

// prettyArray( inArray(['a','e','i','o','u'], ['cat', 'hat', 'hut']) );
// prettyArray( inArray(["arp", "live", "strong", "1"],  ["lively", "alive", "harp", "sharp", "armstrong", "1.9"]) );
prettyArray( inArray([ "1","3"],  ["lively", "alive", "harp", "sharp", "armstrong", "1.9"]) );