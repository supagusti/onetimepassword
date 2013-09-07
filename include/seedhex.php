<?php 
    
function seedhex($seed)
{
    $finalstring="";
    
    // as long as the string is, 2 steps
    for ($i;($i<strlen($seed));$i=$i+2)
    {   
        //take 2 chars from the string
        $hexpart=substr($seed, $i,2); 
        // convert it to dec
        $decpart=  hexdec($hexpart);
        // get the string value of the dec value
        $stringequi=chr($decpart);
        // add the string together
        $finalstring=$finalstring.$stringequi;
    }
    // return the string
    return $finalstring;
}

?>