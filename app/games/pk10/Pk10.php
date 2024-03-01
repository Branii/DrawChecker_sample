<?php 

class Pk10 extends GamePlayFunctionPk10{

    public static function getGamePlayMethod () : Array { //////////// THE INVOKE METHOD
        return parent::getGamePlayFunction();///////////////////////////////////////////
    }///////////////////////////////////////////////////////////////////////////////////

    public static function FirstOneStraightJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection);
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstTwoStraightJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection[0]) && in_array($drawNumber[1], $selection[1]);
    } //-> fn([[1,2,3,4,5],[6,7,8,9,10]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstThreeStraightJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection[0]) && in_array($drawNumber[1], $selection[1]) && in_array($drawNumber[2], $selection[2]);
    } //-> fn([[1,2,3],[4,2,6],[7,3,9,10]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstFourStraightJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection[0]) && in_array($drawNumber[1], $selection[1]) && in_array($drawNumber[2], $selection[2]) && in_array($drawNumber[3], $selection[3]);
    } //-> fn([[1,2,3],[4,2,6],[7,3,9,10],[4,9,10]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstFiveStraightJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection[0]) && in_array($drawNumber[1], $selection[1]) && in_array($drawNumber[2], $selection[2]) && in_array($drawNumber[3], $selection[3]) && in_array($drawNumber[4], $selection[4]);
    } //-> fn([[1,2,3],[4,2,6],[7,3,9,10],[4,9,10],[1,2,5]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstTwoStraightManual(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 2);
        foreach ($selection[0] as $value) {
            $splited = explode(',', $value);
            if (in_array($winningNumbers[0], $splited) && in_array($winningNumbers[1], $splited)) return true;
        }return false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstThreeStraightManual(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 3);
        foreach ($selection[0] as $value) {
            $splited = explode(',', $value);
            if (in_array($winningNumbers[0], $splited) && in_array($winningNumbers[1], $splited) && in_array($winningNumbers[2], $splited)) return true;
        }return false;
    } //-> fn([["01","02","1,2","1,2,3"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstFourStraightManual(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 4);
        foreach ($selection[0] as $value) {
            $splited = explode(',', $value);
            if (in_array($winningNumbers[0], $splited) && in_array($winningNumbers[1], $splited) && in_array($winningNumbers[2], $splited) && in_array($winningNumbers[3], $splited)) return true;
        }return false;
    } //-> fn([["01","02","1,2","1,2,3","1,2,3,4"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstFiveStraightManual(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 5);
        foreach ($selection[0] as $value) {
            $splited = explode(',', $value);
            if (in_array($winningNumbers[0], $splited) && in_array($winningNumbers[1], $splited) && in_array($winningNumbers[2], $splited) && in_array($winningNumbers[3], $splited) && in_array($winningNumbers[4], $splited)) return true;
        }return false;
    } //-> fn([["01","02","1,2","1,2,3","1,2,3,4","1,2,3,4,5"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function FirstFiveFixedPlace(array $selection, array $drawNumber): bool {
        $winningNumbers = array_slice($drawNumber, 0, 5);
        foreach ($selection as $index => $selectedNumbers) {
            if (in_array($winningNumbers[$index], $selectedNumbers)) {
                return true;
            }
        }return false;
    }//-> fn([[1],[2],[],[],[]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function LastFiveFixedPlace(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, -5);
        foreach ($selection as $index => $selectedNumbers) {
            if (in_array($winningNumbers[$index], $selectedNumbers)) {
                return true;
            }
        }return false;
    } //-> fn([[1],[2],[],[]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function DragonTiger(string $selection, array $drawNumber){
        $data = [
            '1v10'=> self::DT(0, 9, $drawNumber),
            '2v9' => self::DT(1, 8, $drawNumber),
            '3v8' => self::DT(2, 7, $drawNumber),
            '4v7' => self::DT(3, 6, $drawNumber),
            '5v6' => self::DT(5, 7, $drawNumber),
        ];
        $data = json_decode($selection, true)[0];
        $count = 0;
        foreach ($data as $key => $value) {
           $count += (count($value) == 2 || $data[$key] == $value[0]) ? 1 : 0;
        }
        return $count >= 2 ? true : false;
    }//-> fn([{"1v10":[303,304],"2v9":[303,304],"3v8":[304]}]) = 3 true

    public static function DT(Int $idx1, Int $idx2, Array $drawNumber) : String { // dragon|tiger|tie pattern
        $drawNumber = explode(",", implode(",",$drawNumber));
        $v1 = $drawNumber[$idx1];
        $v2 = $drawNumber[$idx2];
        return ($v1 > $v2) ? "303" : (($v1 == $v2) ? "Tie" : "304");
    }

    public static function pick2Joint(Array $selection, Array $drawNumber) : Bool {
        $count = 0;
        for ($i = 0; $i <= 9; $i++) {
            if (in_array($drawNumber[$i], $selection[$i])) {
                $count++;
            }
        }return $count >= 2 ? true : false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function pick2Manual(Array $selection, Array $drawNumber) : Bool { // review
       
        $rows = $selection[0];
        $selected = $selection[1];

        foreach ($rows as $value) {
            # code...
        }
        for ($i = 0; $i <= 9; $i++) {
            if (in_array($drawNumber[$i], $selection[$i])) {
                $count++;
            }
        }return $count >= 2 ? true : false;

    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true



}

var_dump(Pk10::FirstFiveFixedPlace([[5],[3],[],[],[]],[1,2,3,4,5,6,7,8,9,10])); // true