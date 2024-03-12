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

    public static function pick2Manual(Array $selection, Array $drawNumber) : Bool { // needs review
        $rows = $selection[0];
        $selected = $selection[1];
        $count = 0;
        foreach ($rows as $value) {
            $ball = $drawNumber[$value - 1];
            $sell = $selected[$value - 1];
            in_array($ball, explode(',', $sell)) ? $count++ : null;
        }return $count >= 2 ? true : false;

    } //-> fn([["1","2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function pick3Joint(Array $selection, Array $drawNumber) : Bool {
        $count = 0;
        for ($i = 0; $i <= 9; $i++) {
            if (in_array($drawNumber[$i], $selection[$i])) {
                $count++;
            }
        }return $count >= 3 ? true : false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function pick3Manual(Array $selection, Array $drawNumber) : Bool { // needs review
        $rows = $selection[0];
        $selected = $selection[1];
        $count = 0;
        foreach ($rows as $value) {
            $ball = $drawNumber[$value - 1];
            $sell = $selected[$value - 1];
            in_array($ball, explode(',', $sell)) ? $count++ : null;
        }return $count >= 3 ? true : false;
    } //-> fn([["1","2","3"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function BseoFirst5(Array $selection, array $drawNumber)  : Bool  { // review 
        $winningNumbers = array_slice($drawNumber, 0, 5);
        $data = [
            '1' => range(6,10),
            '2' => range(1,5),
            '3' => range(1,9,2),
            '4' => range(0,8,2)
        ];
        $count = 0;
        foreach ($selection as $value) {
           foreach ($value as $number) {
               count(array_intersect($data[$number], $winningNumbers)) >= 1 ? $count++ : null;
           }
        }
        return $count >= 1 ? true : false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function BsoeTopTwo(Array $selection, array $drawNumber) : Bool { // review
        $sum = array_sum(array_slice($drawNumber, 0, 2));
        $data = [
            '1' => range(12,19),
            '2' => range(3,11),
            '3' => range(1,9,2),
            '4' => range(0,8,2)
        ];
        $count = 0;
        foreach ($selection[0] as $value) {
           if(in_array($sum,$data[$value])) $count++;
        }
        return $count >= 1 ? true : false;
    } //-> fn([["1","2"],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function SumOfTopTwo(Array $selection, array $drawNumber) : Bool { // review
        $sum = array_sum(array_slice($drawNumber, 0, 2));
        return in_array($sum, $selection[0]) ? true : false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true

    public static function SumOfFirstThree(Array $selection, array $drawNumber) : Bool { // review
        $sum = array_sum(array_slice($drawNumber, 0, 3));
        return in_array($sum, $selection[0]) ? true : false;
    } //-> fn([["01","02","1,2"]],[1,2,3,4,5,6,7,8,9,10]) = true



    ######################  PK 10 Board Game  ######################

    public static function  FarwardAndBack(Array $selection, Array $drawNumber) :Bool{

        $topFiveValues   = array_slice($drawNumber, 0, count($drawNumber) / 2);
        $LastFiveValues  = array_slice($drawNumber, count($drawNumber) / 2);
        $sumTopValues    = array_sum($topFiveValues );
        $sumLastValues   = array_sum($LastFiveValues);
        $results =  ($sumTopValues > $sumLastValues) ?"Foward" : "Backward";
        return (in_array($results,$selection[0]))? "1" :"0";
        
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    public static  function  GuessTheWinner(Array $selection , Array $drawNumber ) : Bool {
        return (in_array($drawNumber[0], $selection[0])) ?"1":"0";         
    }//fn([1,2,3,4,5], [1,2,]
    
     public static  function  MaximumValue(Array $selection , Array $drawNumber ) : Bool {
    
        $topFiveValues = array_slice($drawNumber, 0, count($drawNumber) / 2);
        $maxNumber   = $topFiveValues[0]; // Initialize with the first number
        $maxPosition = 0; // Initialize with the position of the first number
        for ($i = 1; $i < count($topFiveValues); $i++) {
            if ($topFiveValues[$i] > $maxNumber) {
                $maxNumber = $topFiveValues[$i];
                $maxPosition = $i;
            }
        }
    
        $positions = ["First Place", "Second Place", "Third Place", "Fourth Place", "Fiveth Place"];
        $result = $positions[$maxPosition];
        return  (in_array($result, $selection[0]))? "1" :"0";
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
     public static  function  MinimumValue(Array $selection , Array $drawNumber ) : Bool {
    
        $LastFiveValues  = array_slice($drawNumber, count($drawNumber) / 2);
        $maxNumber   = $LastFiveValues[0]; // Initialize with the first number
        $maxPosition = 0; // Initialize with the position of the first number
        for ($i = 1; $i < count($LastFiveValues); $i++) {
            if ($LastFiveValues[$i] < $maxNumber) {
                $maxNumber = $LastFiveValues[$i];
                $maxPosition = $i;
            }
        }
       
        $positions = ["Sixth Place", "Seventh Place", "Eigth Place", "Ninth Place", "Tenth Place"];
        $result = $positions[$maxPosition];
        return  (in_array($result, $selection[0]))? "1" :"0";
       
        
    }

    public  static function QuickOrSlow(Array $selection , Array $drawNumber) : Bool{
        $topFiveValues   = array_slice($drawNumber, 0, count($drawNumber) / 2);
        $result = (in_array(1, $topFiveValues)) ? "Quick" : "Slow";
        return (in_array($result, $selection[0]) )? "1":"0";
    }

     ######################  PK 10 ROAD BET Game  ######################

  public static function DT(Int $idx1, Int $idx2, Array $drawNumber) : String { // dragon|tiger|tie pattern
        $drawNumber = explode(",", implode(",",$drawNumber));
        $v1 = $drawNumber[$idx1];
        $v2 = $drawNumber[$idx2];
        return ($v1 > $v2) ? "Dragon" : (($v1 == $v2) ? "Tie" : "Tiger");
  }
  
  public static function SumOfFirstTwo(Array $selection, Array $drawNumber) : Bool { // SumOfFirstTwo
    $data = [
       'Big' =>  array_sum(array_slice($drawNumber,0,2)) >= 6 ? true : false,
       'Small' => array_sum(array_slice($drawNumber,0,2)) <= 6 ? true : false,
       'Even' => array_sum(array_slice($drawNumber,0,2)) % 2 == 0 ? true : false,
       'Odd' => array_sum(array_slice($drawNumber,0,2)) % 2 != 0 ? true : false
     ];return $data[$selection[0]];
  }
  
  public static function BigSmallFirstBall(Array $selection, Array $drawNumber) : Bool { // first ball
    $data = [
         'Big' =>  $drawNumber[0] >= 6 ? true : false,
         'Small' => $drawNumber[0] <= 6 ? true : false,
         'Even' => $drawNumber[0] % 2 == 0 ? true : false,
         'Odd' => $drawNumber[0] % 2 != 0 ? true : false,
         'Dragon' => self::DT(0, 9, $drawNumber) == "Dragon" ? true : false,
         'Tiger' => self::DT(0, 9, $drawNumber) == "Tiger" ? true : false
      ];
      return $data[$selection[0]];
  }
  
  public static function BigSmallSecondBall(Array $selection, Array $drawNumber) : Bool { // second ball
    $data = [
         'Big' =>  $drawNumber[1] >= 6 ? true : false,
         'Small' => $drawNumber[1] <= 6 ? true : false,
         'Even' => $drawNumber[1] % 2 == 0 ? true : false,
         'Odd' => $drawNumber[1] % 2 != 0 ? true : false,
         'Dragon' => self::DT(1, 8, $drawNumber) == "Dragon" ? true : false,
         'Tiger' => self::DT(1, 8, $drawNumber) == "Tiger" ? true : false
         
      ];return $data[$selection[0]];
  }
  
  public static function BigSmallThirdBall(Array $selection, Array $drawNumber) : Bool { // third ball
    $data = [
         'Big' =>  $drawNumber[2] >= 6 ? true : false,
         'Small' => $drawNumber[2] <= 6 ? true : false,
         'Even' => $drawNumber[2] % 2 == 0 ? true : false,
         'Odd' => $drawNumber[2] % 2 != 0 ? true : false,
         'Dragon' => self::DT(2, 7, $drawNumber) == "Dragon" ? true : false,
         'Tiger' => self::DT(2, 7, $drawNumber) == "Tiger" ? true : false
    ];return $data[$selection[0]];
  }
  
  public static function BigSmallFourthBall(Array $selection, Array $drawNumber) : Bool { // fourth ball
    $data = [
         'Big' =>  $drawNumber[3] >= 6 ? true : false,
         'Small' => $drawNumber[3] <= 6 ? true : false,
         'Even' => $drawNumber[3] % 2 == 0 ? true : false,
         'Odd' => $drawNumber[3] % 2 != 0 ? true : false,
         'Dragon' => self::DT(3, 6, $drawNumber) == "Dragon" ? true : false,
         'Tiger' => self::DT(3, 6, $drawNumber) == "Tiger" ? true : false
    ];return $data[$selection[0]];
  }
  
  public static function BigSmallFifthBall(Array $selection, Array $drawNumber) : Bool { // fifth ball
    $data = [
         'Big' =>  $drawNumber[4] >= 6 ? true : false,
         'Small' => $drawNumber[4] <= 6 ? true : false,
         'Even' => $drawNumber[4] % 2 == 0 ? true : false,
         'Odd' => $drawNumber[4] % 2 != 0 ? true : false,
         'Dragon' => self::DT(5, 7, $drawNumber) == "Dragon" ? true : false,
         'Tiger' => self::DT(5,79, $drawNumber) == "Tiger" ? true : false
    ];return $data[$selection[0]];
  }
  
  public static function BigSmallSixBall(Array $selection, Array $drawNumber) : Bool { // sixth ball
  $data = [
       'Big' =>  $drawNumber[5] >= 6 ? true : false,
       'Small' => $drawNumber[5] <= 6 ? true : false,
       'Even' => $drawNumber[5] % 2 == 0 ? true : false,
       'Odd' => $drawNumber[5] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
  public static function BigSmallSevenBall(Array $selection, Array $drawNumber) : Bool { // seventh ball
    $data = [
       'Big' =>  $drawNumber[6] >= 6 ? true : false,
       'Small' => $drawNumber[6] <= 6 ? true : false,
       'Even' => $drawNumber[6] % 2 == 0 ? true : false,
       'Odd' => $drawNumber[6] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
  public static function BigSmallEightBall(Array $selection, Array $drawNumber) : Bool { // eight ball
  $data = [
     'Big' =>  $drawNumber[7] >= 6 ? true : false,
     'Small' => $drawNumber[7] <= 6 ? true : false,
     'Even' => $drawNumber[7] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[7] % 2 != 0 ? true : false
   ];return $data[$selection[0]];
  }
  
  public static function BigSmallNineBall(Array $selection, Array $drawNumber) : Bool { // ninth ball
  $data = [
     'Big' =>  $drawNumber[8] >= 6 ? true : false,
     'Small' => $drawNumber[8] <= 6 ? true : false,
     'Even' => $drawNumber[8] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[8] % 2 != 0 ? true : false
   ];return $data[$selection[0]];
  }
  
  public static function BigSmallTenBall(Array $selection, Array $drawNumber) : Bool { // tenth ball
  $data = [
     'Big' =>  $drawNumber[9] >= 6 ? true : false,
     'Small' => $drawNumber[9] <= 6 ? true : false,
     'Even' => $drawNumber[9] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[9] % 2 != 0 ? true : false
   ];return $data[$selection[0]];
  }


}
