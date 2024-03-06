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


    ############################### HPPY 8 Board Games ##################################

    public static function BigAndSmall (Array $selection, Array $drawNumber) : bool {
        $data = [
            'Big'   => array_sum($drawNumber) > 810 ? true : false,
            'and'   => array_sum($drawNumber) == 810 ? true : false,
            'Small' => array_sum($drawNumber) < 810 ? true : false
          ];
        return $data[$selection[0]];
      }
      
      public static function SuperirrMiddelLower(Array $selection, Array $drawNumber) {
        $superNum = array_filter($drawNumber, function($num) {
              return is_numeric($num) && intval($num) >= 1 && intval($num) <= 40;
        });$duperNum = array_diff($drawNumber, $superNum);
        $data = [
            'Superior' => count($superNum) > count($duperNum) ? true : false,
            'Middle'   => count($superNum) == count($duperNum) ? true : false,
            'Lower'    => count($duperNum) > count($superNum) ? true : false,
        ];
        return $data[$selection[0]];
      }
      
      public static function OddTieEven(Array $selection, Array $drawNumber) : bool {
        $data = [
            'Odd'   => count(array_filter($drawNumber, fn($num) => $num % 2 != 0)) > count(array_filter($drawNumber, fn($num) => $num % 2 == 0)) ? true : false,
            'Tie'   => count(array_filter($drawNumber, fn($num) => $num % 2 != 0)) == count(array_filter($drawNumber, fn($num) => $num % 2 == 0)) ? true : false,
            'Even' => count(array_filter($drawNumber, fn($num) => $num % 2 == 0)) > count(array_filter($drawNumber, fn($num) => $num % 2 != 0)) ? true : false
          ];
        return $data[$selection[0]];
      }
      
      public static function BOSOBESE(Array $selection, Array $drawNumber) {
        $data = [
          'One' => array_sum($drawNumber) % 2 != 0 ? true : false,
          'Pair' => array_sum($drawNumber) % 2 == 0 ? true : false,
          'Big Odd' => array_sum($drawNumber) > 810 && array_sum($drawNumber) % 2 != 0  ? true : false,
          'Small Odd' => array_sum($drawNumber) < 810 && array_sum($drawNumber) % 2 != 0  ? true : false,
          'Big Even' => array_sum($drawNumber) > 810 && array_sum($drawNumber) % 2 == 0  ? true : false,
          'Small Even' => array_sum($drawNumber) < 810 && array_sum($drawNumber) % 2 == 0  ? true : false
        ];
        return $data[$selection[0]];
      }
      
      public static function GoldAndOthers(Array $selection, Array $drawNumber) {
          
          $data = [
            'gold' => in_array(array_sum($drawNumber),range(210, 695))? true : false,
            'wood' => in_array(array_sum($drawNumber),range(696, 763))? true : false,
            'water' => in_array(array_sum($drawNumber),range(764, 855))? true : false,
            'fire' => in_array(array_sum($drawNumber),range(856, 923))? true : false,
            'earth' => in_array(array_sum($drawNumber),range(924, 1410))? true : false
          ];
          return $data[$selection[0]];
          
      }



}