<?php

function expanded_form(int $n): string {
    $result= "";
    $str= strval($n);
    $arr= str_split($str);
    $len= count($arr);
    $val = [];
    $counter=-1;
    for ($i=$len; $i>-1; $i--){
        $local=$arr[$i];
        echo $local, "\n";
        if($local!="0"){
            $suffix= "";
            for ($j=0; $j<$counter; $j++){
                $suffix .= "0";
                }
            $local .= $suffix;
            array_unshift($val,$local);
        }
        $counter++;
    }
    echo count($val), "\n";
    array_pop($val);
    return implode(" + ", $val);
  }

  echo expanded_form(101);