<?php

function babySharkLyrics() {
    $a="";
    $x=["Baby","Mommy","Daddy","Grandma","Grandpa"];
    for($i=0; $i<6; $i++){
        for($j=0; $j<4; $j++){
            $p=$i<5?$x[$i]." shark": "Let's go hunt";
            $s=$j<3?", doo doo doo doo doo doo\n":"!\n";
            $a.=$p.$s;
        }
    }
    // $e='\u2026';
    return $a.="Run away,…";
}
// echo(babySharkLyrics());

echo utf8_encode("2026");

// function babySharkLyrics() {$a="";$x=["Baby", "Mommy", "Daddy", "Grandma", "Grandpa"];for($i=0; $i<6; $i++){for($j=0; $j<4; $j++){$p=$i<5?$x[$i]." shark": "Let's go hunt";$s=$j<3?", doo doo doo doo doo doo\n":"!\n";$a.=$p.$s;}}$e='\u2026';return $a.="Run away,$e";}