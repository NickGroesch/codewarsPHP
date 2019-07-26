<?php
function isValidIP(string $str): bool{
    $arr=explode(".",$str);
    if (count($arr)!=4){
        return false;
    }
    foreach($arr as $num){
        if(!preg_match('/\d/', $num)){
            return false;
        }
        if(preg_match('/\s/',$num))
        $int= intval($num);
            if($num[0]=="0"&&$int>0){
                return false;
            }
        if($int<0||$int>255){
            return false;
        }
    }
    return true;
}
