<?php

function parse_molecule(string $formula): array {
    // first we need to split the molecule into components: compounds(bracketed), elements, and multipliers
    // we will start with splitting via brackets (which we will do via recursion)
    $unparsed=true;
    $atoms=[];
    $index=0;
    $opener=0;
    while($unparsed){
        if (findOpener($formula, $index)){
            $opener= findOpener($formula, $index);
            $index= $opener;
            echo "opener $opener $formula[$opener] \n" ;
            $closer= findCloser($formula, $index, $formula[$opener]);
            echo "closer $closer $formula[$closer] \n";
        }
        $unparsed=false;
    }
    return $atoms;
}
parse_molecule("HHHHHHHHHHH(HHHHHHHHH{HO}2)3HH");

function findOpener(string $formula, int $index){
    if (preg_match('/[\[{\(]/', $formula, $matches, PREG_OFFSET_CAPTURE, $offset=$index)){
        $opener= $matches[0][1];
        $index= $opener;
        return $opener;
    }else{
        return false;}
}

function findCloser(string $formula, int $index, string $opener){
    $pairs=[
        "("=>"\)",
        "{"=>"\}",
        "["=>"\]"
    ];
    echo "findCloser $opener \n";
    $regex= '\'/' . $pairs[$opener] . '/\'';
    echo "$regex \n";
    if (preg_match($regex, $formula, $matches, PREG_OFFSET_CAPTURE, $offset=$index)){
        $inhere= $matches[0][1];
        echo "$inhere \n";
        return $inhere;
    }
}