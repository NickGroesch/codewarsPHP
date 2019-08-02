<?php

function parse_molecule(string $formula): array {
    // first we need to split the molecule into components: compounds(bracketed), elements, and multipliers
    // we will start with splitting via brackets (which we will do via recursion)
    $unparsed=true;
    $atoms=[];
    $index=0;
    $opener=0;
    while($unparsed){
        echo "index $index\n";
        if($atoms){prettyArray($atoms);}
        if(ctype_upper($formula[$index])){
            echo "might be an atom\n";
            if(ctype_upper($formula[$index+1])){
                if($atoms[$formula[$index]]){$atoms[$formula[$index]]++;}else{$atoms+=[$formula[$index]=>1];}
                // $atoms[$formula[$index]]?$atoms[$formula[$index]]++:$atoms+=[$formula[$index]=>1];
                echo "so it is\n";
            }else if(ctype_lower($formula[$index+1])){

                $double= $formula[$index]; // $formula[$index+1];
                $double.= $formula[$index+1];
                if($atoms[$double]){$atoms[$double]++;}else{$atoms+=[$double=>1];}
            }
        }
        // if (findOpener($formula, $index)){
        //     $opener= findOpener($formula, $index);
        //     $index= $opener;
        //     echo "opener $opener $formula[$opener] \n" ;
        //     $closer= findCloser($formula, $index, $formula[$opener]);
        //     echo "closer $closer $formula[$closer] \n";
        // }

        $unparsed= $index>strlen($formula) ? false : true;
        $index++;
    }
    return $atoms;
}
parse_molecule("HXHHXXHHHHXXXHxHxHx(HHHHHHHHH{HO}2)3HH");//impossible molecule, but helpful test case;

// function findOpener(string $formula, int $index){
//     if (preg_match('/[\[{\(]/', $formula, $matches, PREG_OFFSET_CAPTURE, $offset=$index)){
//         $opener= $matches[0][1];
//         $index= $opener;
//         return $opener;
//     }else{
//         return false;}
// }

function findCloser(string $formula, int $index, string $opener){
    $pairs=[
        "("=>")",
        "{"=>"}",
        "["=>"]"
    ];
    // echo "$formula\n";
    // echo "findCloser $opener \n";
    $search= $pairs[$opener];
    // echo "looking for $search\n";
    $openCount=0;
    $index+=1;
    while($openCount>-1){
        if($openCount==0&&$search==$formula[$index]){return $index;}
        if($openCount>0&&$search==$formula[$index]){$openCount--;}
        if($formula[$index]==$opener){$openCount++;}
        if($index>strlen($formula)){return "WTF";}
        // echo "char $formula[$index] index $index openCount $openCount\n";
        $index++;
    }
}
function prettyArray(array $ugly){
    foreach($ugly as $key=>$value) {
        echo "$key=>$value\n";
    }
}