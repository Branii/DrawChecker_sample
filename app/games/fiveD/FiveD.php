<?php 

class FiveD extends GamePlayFunction5D{ 

    public static function getGamePlayMethod () : Array { //////////// THE INVOKE METHOD
        return parent::getGamePlayFunction();///////////////////////////////////////////
    }///////////////////////////////////////////////////////////////////////////////////
    
    public static function group120(Array $selection, Array $drawNumber) : Bool { // group 120
        sort($drawNumber); sort($selection);
        return Utils::findPattern([1,1,1,1,1], $drawNumber, 0, 5) && 
        $drawNumber == $selection ? true : false; #-> fn([1,2,3,4,5],[5,2,3,4,1],[1,1,1,1,1],5) = true
    }

    public static function group60(Array $selection, Array $drawNumber) : bool { // group 60
        $val = array_count_values($drawNumber); unset($selection[1][max($val)]);
        return Utils::findPattern([2,1,1,1], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) &&
        count(array_intersect($selection[1], $drawNumber)) == 3; #-> fn([2,2,1,4,6],[[2,1,4],[2,6,4,3,1]],[2,1,1,1],5) = true
    }

    public static function group30(Array $selection, Array $drawNumber) : bool { // group 30
        $draw = array_keys(array_filter(array_count_values($drawNumber), fn($count) => $count === 1));
        return Utils::findPattern([2,2,1], $drawNumber, 0, 5) && 
        count(array_intersect($selection[0], $drawNumber)) == 2 && 
        in_array($draw[0],$selection[1]); #-> fn([2,2,8,8,0],[[2,8][0]],[2,2,1],5) = true
    }

    public static function group20(Array $selection, Array $drawNumber) : bool { // group 20
        $val = array_count_values($drawNumber);
        return Utils::findPattern([3,1,1], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        count(array_intersect(array_diff($selection[1], [array_search(max($val), $val)]), $drawNumber)) == 2; #-> fn([5,5,5,6,7],[7,5,5,6,5],[3,1,1],5) = true
    }

    public static function group10(Array $selection, Array $drawNumber): bool { // group 10
        $val = array_count_values($drawNumber);
        return Utils::findPattern([3,2], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        in_array(array_search(min($val), $val), $selection[1]); #-> fn([9,9,9,2,2],[,2,9,9,9,2],[3,2],5) = true
    }

    public static function group5(Array $selection, Array $drawNumber): bool { // group 5
        $val = array_count_values($drawNumber);
        return Utils::findPattern([4,1], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        in_array(array_search(min($val), $val), array_diff($selection[1],[array_search(max($val), $val)])); #-> fn([6,6,6,6,0],[0,6,6,6,6],[4,1],5) = true
    }

    #endregion----------------------------------------------------------------------------------------end of all5

    #region ------------------------------------------------------------------------------------------begin all4

    public static function group24(Array $selection, Array $drawNumber): mixed { // group 24
        sort($drawNumber); sort($selection);
        return Utils::findPattern([1,1,1,1], $drawNumber, 0, 5) && 
        $drawNumber == $selection ? true : false; #-> fn([1,1,2,2,3],[[1,2,3,4]],[1,1,1,1],5) = true
    }

    public static function group12(Array $selection, Array $drawNumber): mixed { // group 12
        $val = array_count_values($drawNumber); unset($selection[1][max($val)]);
        return Utils::findPattern([2,1,1], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) &&
        count(array_intersect($selection[1], $drawNumber)) == 2; #-> fn([1,1,2,3],[[1,2],[2,3]],[2,1,1],4) = true
    }

    public static function group6(Array $selection, Array $drawNumber): mixed { // group 6
        $val = array_count_values($drawNumber);
        return Utils::findPattern([2,1,1], $drawNumber, 0, 5) && 
        in_array(array_search(max($val), $val), $selection[0]) && 
        count(array_intersect(array_diff($selection[1], [array_search(max($val), $val)]), $drawNumber)) == 1; #-> fn([1,1,2,3],[[1,2],[2,3]],[2,1,1],4) = true
    }

}
