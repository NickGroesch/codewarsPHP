<?php

// function menFromBoys($arr) {
//     $men=[];
//     $boys=[];
//     foreach($arr as $male){
//         switch ($male%2){
//             case 0: array_push($men, $male);
//             break;
//             case 1: array_push($boys, $male);
//             break;
//         }
//     }
//     sort($men, $sort_flags= SORT_NUMERIC);
//     sort($boys, $sort_flags= SORT_NUMERIC);
//     $unimen= array_unique($men);
//     $uniboys= array_unique($boys);
//     $revboys= array_reverse($uniboys);
//     $solution=[];
//     foreach($unimen as $man){
//         array_push($solution, $man);
//     }
//     foreach($revboys as $boy){
//         array_push($solution, $boy);
//     }
//     return ($solution);
//   }

  function menFromBoys($arr) {
    $men=[];
    $boys=[];
    foreach($arr as $male){
        switch ($male%2){
            case 0: array_push($men, $male);
            break;
            case 1||-1: array_push($boys, $male);
            break;
        }
    }
    sort($men);
    sort($boys);
    $umen=array_unique($men);
    $uboys=array_unique($boys);
    $revboys= array_reverse($uboys);
    $solution=[];
    foreach($umen as $man){
        array_push($solution, $man);
    }
    foreach($revboys as $boy){
        array_push($solution, $boy);
    }
    return ($solution);
  }