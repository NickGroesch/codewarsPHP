<?php

function babySharkLyrics() {
    $lyrics="";
    $prefixes=["Baby shark", "Mommy shark", "Daddy shark", "Grandma shark", "Grandpa shark", "Let's go hunt"];
    $suffixes=[", doo doo doo doo doo doo\n",", doo doo doo doo doo doo\n",", doo doo doo doo doo doo\n","!\n"];
    foreach($prefixes as $prefix){
        foreach($suffixes as $suffix){
            $lyrics.= $prefix.$suffix;
        }
    }
    return $lyrics.="Run away,...";
}
echo(babySharkLyrics());