<?php 
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
class BaseClass { 

    ###########################################
    # 5D GAMES WIN OR LOST CHECKING FUNCTIONS #
    ###########################################

    #Region ------------------------------------------------------------------------------------------Begin all5

    public static function group120(Array $drawNumber, Array $selection, Array $pattern, Int $slice) : Bool { // group 120
        sort($drawNumber); sort($selection);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        $drawNumber == $selection ? true : false; #-> fn([1,2,3,4,5],[5,2,3,4,1],[1,1,1,1,1],5) = true
    }

    public static function group60(Array $drawNumber, Array $selection, Array $pattern, Int $slice) : bool { // group 60
        $val = array_count_values($drawNumber); unset($selection[1][max($val)]);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) &&
        count(array_intersect($selection[1], $drawNumber)) == 3; #-> fn([2,2,1,4,6],[[2,1,4],[2,6,4,3,1]],[2,1,1,1],5) = true
    }

    public static function group30(Array $drawNumber, Array $selection, Array $pattern, Int $slice) : bool { // group 30
        $draw = array_keys(array_filter(array_count_values($drawNumber), fn($count) => $count === 1));
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        count(array_intersect($selection[0], $drawNumber)) == 2 && 
        in_array($draw[0],$selection[1]); #-> fn([2,2,8,8,0],[[2,8][0]],[2,2,1],5) = true
    }

    public static function group20(Array $drawNumber, Array $selection, Array $pattern, Int $slice) : bool { // group 20
        $val = array_count_values($drawNumber);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        count(array_intersect(array_diff($selection[1], [array_search(max($val), $val)]), $drawNumber)) == 2; #-> fn([5,5,5,6,7],[7,5,5,6,5],[3,1,1],5) = true
    }

    public static function group10(Array $drawNumber, Array $selection, Array $pattern, Int $slice): bool { // group 10
        $val = array_count_values($drawNumber);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        in_array(array_search(min($val), $val), $selection[1]); #-> fn([9,9,9,2,2],[,2,9,9,9,2],[3,2],5) = true
    }

    public static function group5(Array $drawNumber, Array $selection, Array $pattern, Int $slice): bool { // group 5
        $val = array_count_values($drawNumber);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        in_array(array_search(min($val), $val), array_diff($selection[1],[array_search(max($val), $val)])); #-> fn([6,6,6,6,0],[0,6,6,6,6],[4,1],5) = true
    }

    #endregion----------------------------------------------------------------------------------------end of all5

    #region ------------------------------------------------------------------------------------------begin all4

    public static function group24(Array $drawNumber, Array $selection, Array $pattern, Int $slice): mixed { // group 24
        sort($drawNumber); sort($selection);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        $drawNumber == $selection ? true : false; #-> fn([1,1,2,2,3],[[1,2,3,4]],[1,1,1,1],5) = true
    }

    public static function group12(Array $drawNumber, Array $selection, Array $pattern, Int $slice): mixed { // group 12
        $val = array_count_values($drawNumber); unset($selection[1][max($val)]);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) &&
        count(array_intersect($selection[1], $drawNumber)) == 2; #-> fn([1,1,2,3],[[1,2],[2,3]],[2,1,1],4) = true
    }

    public static function group6(Array $drawNumber, Array $selection, Array $pattern, Int $slice): mixed { // group 6
        $val = array_count_values($drawNumber);
        return Utils::findPattern($pattern, $drawNumber, 0, $slice) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        count(array_intersect(array_diff($selection[1], [array_search(max($val), $val)]), $drawNumber)) == 1; #-> fn([1,1,2,3],[[1,2],[2,3]],[2,1,1],4) = true
    }

}


var_dump(BaseClass::group12([1,1,2,3],[[1,2],[2,3]],[2,2],4));