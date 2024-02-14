<?php 
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
class All5 { 

    //win or loss checking logic sample
    public static function group120(Array $drawNumber, Array $selection) : Bool {
        sort($drawNumber); sort($selection);
        return Utils::findPattern([1,1,1,1,1], $drawNumber, 0, 5) && 
        $drawNumber === $selection ? true : false; // no repeat
    }

    

}

