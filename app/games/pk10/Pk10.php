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

    public static function FirstFiveFixedPlace(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 5);
        if(in_array($winningNumbers[0], $selection[0]) || 
        in_array($winningNumbers[1], $selection[1]) ||
        in_array($winningNumbers[2], $selection[2]) || 
        in_array($winningNumbers[3], $selection[3]) || 
        in_array($winningNumbers[4], $selection[4])) return true; else return false;
      
    } //-> fn([[1],[2],[],[],[]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function LastFiveFixedPlace(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, -5);
        if(in_array($winningNumbers[0], $selection[0]) || 
        in_array($winningNumbers[1], $selection[1]) ||
        in_array($winningNumbers[2], $selection[2]) || 
        in_array($winningNumbers[3], $selection[3])) return true; else return false;
    } //-> fn([[1],[2],[],[]],[1,2,3,4,5,6,7,8,9,10]) = true


    //Dragon Tiger Function
    // NOTE - dragontiger function to be implemented by stir
    //please implement the dragon timer function below
    
    public function PickJoint(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber[0], $selection[0]) || 
               in_array($drawNumber[1], $selection[1]) || 
               in_array($drawNumber[2], $selection[2]) ||
               in_array($drawNumber[3], $selection[3]) ||
               in_array($drawNumber[4], $selection[4]) ||
               in_array($drawNumber[5], $selection[5]) ||
               in_array($drawNumber[6], $selection[6]) ||
               in_array($drawNumber[7], $selection[7]) ||
               in_array($drawNumber[8], $selection[8]) ||
               in_array($drawNumber[9], $selection[9]);

    } //-> fn([[[1],[2],[],[],[],[],[],[],[],[]],[1,2,3,4,5,6,7,8,9,10]) = true

    public function PickManual(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection[0] as $value) {
            $splited = explode(',', $value);
           
        }return false;
    } //-> fn([[1,2,3,4,5],[6,7,8,9,10]],[1,2,3,4,5,6,7,8,9,10]) = true

    


}

var_dump(Pk10::FirstFiveFixedPlace([[5],[3],[],[],[]],[1,2,3,4,5,6,7,8,9,10])); // true