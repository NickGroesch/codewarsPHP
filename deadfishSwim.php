<?php

function parse($data) {
    $val=0;
    $result=[];
    $parsed= str_split($data);
    foreach($parsed as $instruction){
        switch($instruction){
            case "i":
                $val++;
                break;
            case "d":
                $val--;
                break;
            case "s":
                $val=$val*$val;
                break;
            case "o":
                array_push($result, $val);
                break;
        }
    }
    return $result;
  }