<?php

// function is_prime(int $n){
//   if (n<2){return false;};
//   $divisor=2;
//   $dividend=$n/$divisor;
//   while($divisor<$dividend){
//     echo "$divisor $dividend";
//     if($n%$divisor==0){
//       echo "false";
//     //   return false;
//     }else{
//       $divisor += 1;
//     };
//   };
//   echo "true";
// //   return true;
// }

$answer= is_prime(7);
echo "$answer \n";
// echo ("WTF");
function is_prime(int $n): bool {
  if ($n<2){return false;};
  $divisor=2;
  $dividend=$n;
  while ($divisor<$dividend) {
      echo "loop ";
    echo "$divisor $dividend \n";
    $a= $n % $divisor;
    if ( $a == 0){
        echo "conditional";
      return false;
    } else {
    $divisor++;
    $dividend= $n / $divisor;
    };
  };
  return true;
}
?>