<?php

function parse_molecule(string $formula): array {
    // first we need to split the molecule into components: compounds(bracketed), elements, and multipliers
    // we will start with splitting via brackets (which we will do via recursion)
    $unparsed=true;
    $atoms=[];
    $index=0;
    $opener=0;
    while($unparsed){
        $local = $formula[$index];
        $next = $formula[$index+1];
        $theFollowing = $formula[$index+2];
        echo "index $index $local\n";
        if(ctype_upper($local)){//its upper
            if(ctype_upper($next)||$index+1>=strlen($formula)||ctype_punct($next)){//next is upper, end, or nested
                if($atoms[$local]){$atoms[$local]++;}else{$atoms+=[$local=>1];}
            }else if(ctype_lower($next)){//next is lower
                $double= $local . $next; 
                $index++;
                if(ctype_digit($theFollowing)){//following is digit
                    $mult= intval($theFollowing);
                    if($atoms[$double]){$atoms[$double]+=$mult;}else{$atoms+=[$double=>$mult];}
                    $index++;
                } else if($atoms[$double]){$atoms[$double]++;}else{$atoms+=[$double=>1];}//following is not digit
            }else if(ctype_digit($next)){//next is digit
                $mult= intval($next);
                if($atoms[$local]){$atoms[$local]+=$mult;}else{$atoms+=[$local=>$mult];}
                $index++;
            }
        }else if(ctype_punct($local)){
            // this is where we do the recursions
            $closer=findCloser($formula, $index, $local);
            $multiplier= $formula[$closer+1];
            $compound=substr($formula, $index+1, $closer-1);
            $addAtoms=parse_molecule($compound);
            foreach($addAtoms as $element=>$number){
                if($atoms[$element]){$atoms[$element]+=$number*$multiplier;}else{$atoms+=[$element=>$number*$multiplier];}
            }
            $index= $closer+1 ;//only works for 1 digit multipliers
        }
        if($atoms){prettyArray($atoms);}
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
    echo "the final answer is:\n";
    return $atoms;
}
// parse_molecule("HXHHXXHHHHXXXHxHxHx(HHHHHHHHH{HO}2)3HH");//impossible molecule, but helpful test case;
// prettyArray(parse_molecule("HOH"));//gtg
// prettyArray(parse_molecule("H2O"));//gtg
// prettyArray(parse_molecule("Hx2O"));//gtg
// prettyArray(parse_molecule("P(H{NP[OH]2}3)4"));//
prettyArray(parse_molecule("P[OH]2"));//


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
                                                                                    // function findOpener(string $formula, int $index){
                                                                                    //     if (preg_match('/[\[{\(]/', $formula, $matches, PREG_OFFSET_CAPTURE, $offset=$index)){
                                                                                    //         $opener= $matches[0][1];
                                                                                    //         $index= $opener;
                                                                                    //         return $opener;
                                                                                    //     }else{
                                                                                    //         return false;}
                                                                                    // }
function prettyArray(array $ugly){
    foreach($ugly as $key=>$value) {
        echo "            $key=>$value\n";
    }
}