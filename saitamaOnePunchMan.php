<?php



function killMonsters($h, $m, $dm) {
    $i=0;
    $cum=0;
    while ($h>0){
        $m -= 3;
        if($m<=0){
            break;
        }
        $i++;
        $h -= $dm;
        $cum +=$dm;
    }
    if ($h>0){
        return "hits: $i, damage: $cum, health: $h";
    }else{
    return "hero died"; 
    }
  }