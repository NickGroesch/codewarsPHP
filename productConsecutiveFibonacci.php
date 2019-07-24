<?php

function fib(int $n, $a=0, $b=1):int{
    if($n==0){return $a;}
    elseif($n==1){return $b;}
    else{ return fib($n-1, $b, $a+$b);}
}

function productFib($prod) {
    $unsolved=true;
    $n=1;
    while($unsolved){
        if(fib($n)*fib($n+1)==$prod){
            return [fib($n), fib($n+1), true];
        }elseif(fib($n)*fib($n+1)>$prod){
            return [fib($n), fib($n+1), false];
        }else{ $n++;}
    }
  }

echo fib(6), "\n";