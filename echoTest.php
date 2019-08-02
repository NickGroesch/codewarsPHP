<?php
echo "PHP works\n";
function sum($carry, $new){
    return $carry+=$new;
}
echo(array_reduce([1,2,3,4], "sum"));
?>