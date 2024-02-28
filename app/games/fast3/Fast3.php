<?php 

class Fast3 {

    public static function Bsoe(Array $selection, Array $drawNumber) : Bool {
        $data = [
        'big'=>range(11, 18),'small'=>range(3, 10),'even'=> range(0, 8, 2),'odd'=> range(1, 9, 2)
        ];
        return in_array(array_sum($drawNumber), $data[$selection[0]]);
    }// fn-> ["small"],[1, 3, 5] = true

    public static function Sum(Array $selection, Array $drawNumber) : Bool {
        return in_array(array_sum($drawNumber),$selection);
    } //fn-> [1,3,5,9],[1, 3, 5] = true

    public static function ToakStandard(Array $selection, Array $drawNumber) : Bool {
        return $selection == $drawNumber;
    }// fn-> [1,1,1],[1,1,1] = true

    public static function ToakAll(Array $selection, Array $drawNumber) : Bool {
        return count(array_count_values($drawNumber)) == 1;
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function ThreeNoStandard(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function ThreeNoGroup(Array $selection, Array $drawNumber) : Bool {
        return count(array_intersect($drawNumber,$selection)) == 3;
    }// fn-> [1,2,3,4],[1,1,1] = true

    public static function ThreeRowStandard(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function ThreeRowSAll(Array $selection, Array $drawNumber) : Bool {
        $data = [[1,2,3],[2,3,4],[3,4,5],[4,5,6]];
        return in_array($drawNumber,$data);
    }// fn-> [[1,2,3],[2,3,4],[3,4,5],[4,5,6]],[1,1,1] = true

    public static function HalfStreakStandard(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function HalfStreakAll(Array $selection, Array $drawNumber) : Bool {
        $data = [[1,2,4],[1,2,5],[1,2,6],[1,3,4],[1,4,5],[1,5,6],[2,3,5],[2,3,6],[2,4,5],[2,5,6],[3,4,6],[3,5,6]];
        return in_array($drawNumber,$data);
    }// fn-> [[1,2,4],[1,2,5],[1,2,6],[1,3,4],[1,4,5]..., [1,2,3]

    public static function MixedStandard(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn->[[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function MixedAll(Array $selection, Array $drawNumber) : Bool {
        $data = [[1,3,5],[1,3,6],[1,4,6],[2,4,6]];
        return in_array($drawNumber,$data);
    }// fn-> [[1,3,5],[1,3,6],[1,4,6],[2,4,6]],[1,1,1] = true

    public static function OnePairStandardManual(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn->[[1,1,2],[1,1,3],[2,2,3]],[1,1,2] = true

    public static function OnePairStandardJoint(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 2);
        return in_array($winningNumbers,$selection[0]) && in_array($drawNumber[2],$selection[1]);
    }// fn->[[[1,1],[2,2],[3,3]],[1,2,3]],[1,1,2] = true

    public static function OneGroup(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection as $value) {
            if (self::findDuplicate($value) == self::findDuplicate($drawNumber)) return true;
        }return false;
    }// fn-> [[2,2],[3,3]],[1,2,2] = true

    public static function TwoNoGroup(Array $selection, Array $drawNumber) : Bool  { // needs review if 111
        $count = (in_array($drawNumber[0], $selection) ? 1 : 0) + 
        (in_array($drawNumber[1], $selection) ? 1 : 0) + 
        (in_array($drawNumber[2], $selection) ? 1 : 0);
        return $count == 2;
    } // fn-> [1,2,3,5],[1,1,1] = true

    public static function TwoNoStandard(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection as $value) {
            if(count(array_intersect($value,$drawNumber)) == 2) return true;
        }return false;
    } // fn-> [[1,2],[1,4]],[1,1,1]

    public static function GuessANumber(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection as $value) {
            if(in_array($value,$drawNumber)) return true;
        }return false;
    } // fn-> [1,2,3],[1,5,1]

    public static function findDuplicate($array1) { #HELPER FUNCTION#
        foreach (array_count_values($array1) as $value => $count) {
            if ($count > 1) return $value;
        }return false;
    }


}

// waiting for twoside,board,roadbet