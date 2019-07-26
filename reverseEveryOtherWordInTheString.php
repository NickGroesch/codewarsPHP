<?php

function reverse($str) {
 $array=explode(" ",$str);
 $len= count($array);
 for ($i=1; $i<len; $i+=2){
     $array[$i]= strrev($array[$i]);
 }
 return implode(" ", $array);
}

echo reverse("the lonely dog is pissed");