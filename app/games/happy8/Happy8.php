<?php 

class Happy8 extends GamePlayFunctionHappy8 { 

    public static function getGamePlayMethod () : Array { //////////// THE INVOKE METHOD
        return parent::getGamePlayFunction();///////////////////////////////////////////
    }///////////////////////////////////////////////////////////////////////////////////

    public static function PickOne(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 1;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10,...20]) = true

    public static function PickTwo(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 2;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true

    public static function PickThree(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 3;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true

    public static function PickFour(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 4;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true

    public static function PickFive(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 5;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true

    public static function PickSix(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 6;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true

    public static function PickSeven(Array $selection, Array $drawNumber) : Bool {
        $newArray = array_merge($selection[0], $selection[1]);
        return count(array_intersect($drawNumber, $newArray)) >= 7;
    } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7,8,9,10...20]) = true


    // happy 8 fun ------------------------------
    public static function FunOverUnder(Array $selection, Array $drawNumber) : Bool {
      return false;
    } 

    public static function FunOddEven(Array $selection, Array $drawNumber) : Bool {
      return false;
    }

    public static function FunSum(Array $selection, Array $drawNumber) : Bool {
      return false;
    }

}