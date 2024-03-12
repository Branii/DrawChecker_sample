<?php 

class Eleven5 extends GamePlayFunction11x5 {

    public static function getGamePlayMethod () : Array { //////////// THE INVOKE METHOD
      return parent::getGamePlayFunction();/////////////////////////////////////////////
    }///////////////////////////////////////////////////////////////////////////////////

    public static function f3straightJoint(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 3);
        return in_array($winningNumbers[0],$selection[0]) &&
        in_array($winningNumbers[1],$selection[1]) && in_array($winningNumbers[2],$selection[2]);
      } // fn -> [['02','01'],['03','04'],['05','07']],['01','03','08','04','05'] = true
      
      public static function f3groupJoint(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 3);
        return count(array_intersect($selection,$winningNumbers)) ==  3;
      } // fn -> ['03','04','02'],['04','03','02','04','05'] = true
      
      public static function f3straightManual(Array $selection, Array $drawNumber) {
        $winningNumbers = array_slice($drawNumber, 0, 3);sort($winningNumbers);
        foreach($selection as $item){
          $newArr = str_split($item[0],2);
          return implode(',', $newArr) === implode(',', $winningNumbers);
        }
      } // fn -> [['030402'],['010608'],['040902']],['04','03','02','04','05'] = true
      
       public static function f3groupManual(Array $selection, Array $drawNumber) {
        $winningNumbers = array_slice($drawNumber, 0, 3);sort($winningNumbers);
        foreach($selection as $item){
          $newArr = str_split($item[0],2); sort($newArr);
          return $newArr == $winningNumbers;
        }
      } // fn -> [['030405'],['010608'],['040902']],['04','03','05','04','05'] = true
      
      
      //############################# first 2 ###################################//
      
      public static function f2straightJoint(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 2);
        return in_array($winningNumbers[0],$selection[0]) &&
        in_array($winningNumbers[1],$selection[1]);
      } // fn -> [['01','02'],['03','05']],['01','03','08','04','05'] = true
      
      public static function f2groupJoint(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 2);
        return count(array_intersect($selection,$winningNumbers)) ==  2;
      } // fn -> ['03','04','02'],['04','03','02','04','05'] = true
      
      public static function f2straightManual(Array $selection, Array $drawNumber) {
        $winningNumbers = array_slice($drawNumber, 0, 2);sort($winningNumbers);
        foreach($selection as $item){
          $newArr = str_split($item[0],2);
          return implode(',', $newArr) === implode(',', $winningNumbers);
        }
      } // fn -> [['030402'],['010608'],['040902']],['04','03','02','04','05'] = true
      
       public static function f2groupManual(Array $selection, Array $drawNumber) {
        $winningNumbers = array_slice($drawNumber, 0, 2);sort($winningNumbers);
        foreach($selection as $item){
          $newArr = str_split($item[0],2); sort($newArr);
          return $newArr == $winningNumbers;
        }
      } // fn -> [['030405'],['010608'],['040902']],['04','03','05','04','05'] = true
      
        //############################# first 3 Any place ###################################//
        
      public static function anyPlace(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 3);
        return count(array_intersect($selection,$winningNumbers)) >= 1;
      } // fn -> ['03','04','02'],['04','03','02','04','05'] = true
      
        //############################# Fixed place ###################################//
        
       public static function fixedPlace(Array $selection, Array $drawNumber) : Bool {
        $winningNumbers = array_slice($drawNumber, 0, 3);
        return in_array($winningNumbers[0],$selection[0]) || in_array($winningNumbers[1],$selection[1]) || 
        in_array($winningNumbers[2],$selection[2]);
      } // fn -> [['01','02'],['03','05']],['01','03','08','04','05'] = true
    
    
        //############################# Pick Joint ###################################//
    
        public static function pickJoint1x1(Array $selection, Array $drawNumber) : Bool {
          $winningNumbers = array_slice($drawNumber, 0, 5);
          return count(array_intersect($selection,$winningNumbers)) == 1;
        } // fn -> ['03','04','02'],['04','03','02','04','05'] = true
    
        public static function pickJoint2x2(Array $selection, Array $drawNumber) : Bool {
          $winningNumbers = array_slice($drawNumber, 0, 5);
          return count(array_intersect($selection,$winningNumbers)) == 2;
        } // fn -> ['03','04'],['04','03','02','04','05'] = true
    
        public static function pickJoint3x3(Array $selection, Array $drawNumber) : Bool {
          $winningNumbers = array_slice($drawNumber, 0, 5);
          return count(array_intersect($selection,$winningNumbers)) == 3;
        } // fn -> ['03','04','02'],['04','03','02','04','05'] = true
    
        public static function pickJoint4x4(Array $selection, Array $drawNumber) : Bool {
          $winningNumbers = array_slice($drawNumber, 0, 5);
          return count(array_intersect($selection,$winningNumbers)) == 4;
        } // fn -> ['03','04','02','01'],['04','03','02','04','05'] = true
    
        public static function pickJoint5x5(Array $selection, Array $drawNumber) : Bool {
          $winningNumbers = array_slice($drawNumber, 0, 5);
          return count(array_intersect($selection,$winningNumbers)) == 5;
        } // fn -> ['03','04','02','07','08'],['04','03','02','08','07'] = true
    
        public static function pickJoint5x6(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return count(array_intersect($selection,$winningNumbers)) == 5;
        } // fn -> ['03','04','02','07','08','01'],['04','03','02','08','07'] = true
    
        public static function pickJoint5x7(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return count(array_intersect($selection,$winningNumbers)) == 5;
        } // fn -> ['03','04','02','07','08','01','06'],['04','03','02','08','07'] = true
    
        public static function pickJoint5x8(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return count(array_intersect($selection,$winningNumbers)) == 5;
        } // fn -> ['03','04','02','07','08','01','06','09','04'],['04','03','02','08','07'] = true
    
    
        //############################# Pick Manual ###################################//
    
        public static function pickManual1x1(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){$newArr = $item[0];
              return in_array($newArr,$winningNumbers);
            }return false;
        } // fn -> [['03'],['04'],['02'],['07'],['08'],['01'],['06'],['09'],['04'],['05']],['04','03','02','08','07'] = true
    
        public static function pickManual2x2(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 2;
            }return false;
          
        } // fn -> [['0304'],['0207'],['0801'],['0609'],['0405']],['04','03','02','08','07'] = true
    
        public static function pickManual3x3(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 3;
            }return false;
        } // fn -> [['030401'],['020705'],['080102'],['060904'],['040502']],['04','03','02','08','07'] = true
    
        public static function pickManual4x4(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 4;
            }return false;
        } // fn -> [['03040102'],['02070508'],['08010203'],['06090405'],['04050206']],['04','03','02','08','07'] = true
    
        public static function pickManual5x5(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 5;
            }return false;
        } // fn -> [['0304010203'],['0207050801'],['0801020302'],['0609040509'],['0405020604']],['04','03','02','08','07'] = true
    
        public static function pickManual5x6(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 5;
            }return false;
        } // fn -> [['0304010203'],['0207050801'],['0801020302'],['0609040509']],['04','03','02','08','07'] = true
    
        public static function pickManual5x7(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 5;
            }return false;
        } // fn -> [['01020304050607'],['01020304058607'],['09020304050607'],['01020304050609']],['04','03','02','08','07'] = true
    
        public static function pickManual5x8(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            foreach($selection as $item){
               $newArr = str_split($item[0],2);
               return count(array_intersect($newArr,$winningNumbers)) == 5;
            }return false;
        } // fn -> [['0102030405060708'],['0102030405860708'],['0902030405060708'],['0102030405060908']],['04','03','02','08','07'] = true
    
    
        //############################# Fixed Digit ###################################//
    
    
        public static function fixedDigit2x2(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return count(array_intersect($winningNumbers,$selection[0])) == 1 && count(array_intersect($winningNumbers,$selection[1])) == 1;
        } // fn -> [['03'],['04']],['04','03','02','08','07'] = true
    
        public static function fixedDigit3x3(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return count(array_intersect($winningNumbers,$selection[0])) == 2 && count(array_intersect($winningNumbers,$selection[1])) == 1;
        } // fn -> [['03','04'],['02']],['04','03','02','08','07'] = true
    
        public static function fixedDigit4x4(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $arrCombine = array_merge($selection[0],$selection[1]);
            return count(array_intersect($winningNumbers,$arrCombine)) == 4;
        } // fn -> [['03','04','01'],['02','08']],['04','03','02','08','07'] = true
    
        public static function fixedDigit5x5(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $arrCombine = array_merge($selection[0],$selection[1]);
            return count(array_intersect($winningNumbers,$arrCombine)) == 5;
        } // fn -> [['03','04','01','02'],['02','08','07']],['04','03','02','08','07'] = true
    
        public static function fixedDigit5x6(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $arrCombine = array_merge($selection[0],$selection[1]);
            return count(array_intersect($winningNumbers,$arrCombine)) == 5;
        } // fn -> [['03','04','01','02'],['02','08','07','06']],['04','03','02','08','07'] = true
    
        public static function fixedDigit5x7(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $arrCombine = array_merge($selection[0],$selection[1]);
            return count(array_intersect($winningNumbers,$arrCombine)) == 5;
        } // fn -> [['03','04','01','02'],['02','08','07','06','09']],['04','03','02','08','07'] = true
    
        public static function fixedDigit5x8(Array $selection, Array $drawNumber)  {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $arrCombine = array_merge($selection[0],$selection[1]);
            return count(array_intersect($winningNumbers,$arrCombine)) == 5;
        } // fn -> [['03','04','01','02'],['02','08','07','06','09','04']],['04','03','02','08','07'] = true
    
        //############################# Fun ###################################//
    
        public static function funOddEven(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            $odd = count(array_intersect(['01','03','05','07','09','11'],$winningNumbers));
            $eve = count(array_intersect(['02','04','06','08','10','12'],$winningNumbers));
            $result = $odd . ' Odd ' . $eve . ' Even';
            foreach ($selection as $item) {
               return in_array($result,$item);
            };return false;
        } // fn -> [['2 Odd 3 Even'],['4 Odd 1 Even']],['04','03','02','08','07'] = true
    
        public static function funTheMiddleNo(Array $selection, Array $drawNumber) : Bool {
            $winningNumbers = array_slice($drawNumber, 0, 5);
            return in_array($winningNumbers[3],$selection);
        } // fn -> ['08'],['04','03','02','08','07'] = true
    
       //############################# Rapido,2Sides ###################################//
    
       // big > 30
       // small < 30
       // tie = 30
       // odd = 1,3,5,7,9
       // even = 2,4,6,8,
    
       public static function twoSidesRapido(String $jsonObject, Array $drawNumber, String $flag) {
        $winningNumbers = array_slice($drawNumber, 0, 5);
        $jsonArray = json_decode($jsonObject, true);
        $position = intval($jsonArray['position']) - 1;
        $posVal = intval($winningNumbers[$position]);
        $selection = $jsonArray['selection'];
        $sum = array_sum($winningNumbers);
        $dummyKey = count(str_split($selection,1)) == 2 ? $selection : 'dummyKey';
          switch ($flag) {
              case "sum":
                  return [
                      'Big' => $sum > 30,
                      'Small' => $sum < 30,
                      'Tie' => $sum == 30,
                      'Odd' => $sum % 2 != 0,
                      'Even' => $sum % 2 == 0,
                      'Dragon' => intval($drawNumber[0]) > intval($drawNumber[4]),
                      'Tiger'  => intval($drawNumber[0]) < intval($drawNumber[4]),
                      'TailBig' => intval(str_split($sum)[1]) >= 5,
                      'TailSmall' => intval(str_split($sum)[1]) <= 4
                  ][$selection];
              case "any":
                  return [
                      'Big' => $posVal > 5,
                      'Small' => $posVal < 6,
                      'Tie' => $posVal == 11,
                      'Odd' => 'hello',
                      'Even' => $posVal % 2 == 0,
                      $dummyKey => $posVal == $selection
                  ][$selection];
          }
       } // fn -> '{"position":"4th","selection":"TailSmall"}',['05','09','09','08','01'], "any" = true
    
       public static function pick(string $jsonString, Array $drawNumber) {
        $jsonArray = json_decode($jsonString, true);
        $selection = explode(",", $jsonArray['selection']);
        switch ($pick = $jsonArray['pick']) {
            case 'first2group':
                return count(array_intersect($selection, array_slice($drawNumber, 0, 2))) == 2;
            case 'first3group':
                return count(array_intersect($selection, array_slice($drawNumber, 0, 3))) == 3;
            default:
                $winningNumbers = array_slice($drawNumber, 0, 5);
                return is_numeric($pick) ? 
                    ($pick < 6 ? count(array_intersect($selection, $winningNumbers)) == $pick :
                    count(array_intersect($selection, $winningNumbers)) >= 5) : false;
        }
       } // fn -> '{"pick":"2","selection":"03,05,01,02"}',['05','09','09','08','01'] = true
    
       public static function straightFirst2Group (Array $selection, Array $drawNumber){
        $winningNumbers = array_slice($drawNumber, 0, 2);
        return in_array($winningNumbers[0],$selection[0]) &&
        in_array($winningNumbers[1],$selection[1]);
       } // fn -> [['02','01'],['03','04']],['01','03','08','04','05'] = true
    
       public static function straightFirst3Group (Array $selection, Array $drawNumber){
        $winningNumbers = array_slice($drawNumber, 0, 3);
        return in_array($winningNumbers[0],$selection[0]) &&
        in_array($winningNumbers[1],$selection[1]) && in_array($winningNumbers[2],$selection[2]);
       } // fn -> [['02','01'],['03','04'],['05','07']],['01','03','08','04','05'] = true

       //############################# Board Games ###################################//
<<<<<<< HEAD
    
         function UpperAndLowerPlate (Array $selection, Array $drawNumber) { // 
           $data = [
           'offering' => count(array_intersect(['07','08','09','10','11'],$drawNumber)) > count(array_intersect(['01','02','03','04','05'],$drawNumber)) ? true : false,
           'lower plate' => count(array_intersect(['01','02','03','04','05'],$drawNumber)) > count(array_intersect(['07','08','09','10','11'],$drawNumber)) ? true : false,
           'Tie' => count(array_intersect(['01','02','03','04','05'],$drawNumber)) == count(array_intersect(['07','08','09','10','11'],$drawNumber)) ? true : false
           ];return $data[$selection[0]];
         }
         
         function GuessTheNumberSum(Array $selection, Array $drawNumber) {
           return array_sum($drawNumber) == $selection[0];
         }
         
         function GuessTheNumberMiddle(Array $selection, Array $drawNumbe) {
           sort($drawNumbe);
           return $drawNumbe[2] == $selection[0];
         }
         
         function OddandEvenDisk(Array $selection, Array $drawNumbe) {
           $data = [
             'Single plate'=> count(array_intersect(['01','03','05','07','09','11'],$drawNumber)) > count(array_intersect(['02','04','06','08','10'],$drawNumber)) ? true : false,
             'double lotus' => count(array_intersect(['01','03','05','07','09','11'],$drawNumber)) < count(array_intersect(['02','04','06','08','10'],$drawNumber)) ? true : false
           ];return $data[$selection];
         }

     //############################# Dragon And Tiger ###################################//
    
=======


     //############################# ROAD BET 11X5 ###################################//

  public static function SumAllDrawNumber(Array $selection, Array $drawNumber) : Mixed {
    $data = [
     'Big' =>   array_sum($drawNumber) > 30 ? true : (array_sum($drawNumber)) == 30 ? 'Tie' : false,
     'Small' => array_sum($drawNumber) < 30 ? true : (array_sum($drawNumber)) == 30 ? 'Tie' : false,
     'Even' =>  array_sum($drawNumber) % 2 == 0 ? true : false,
     'Odd' =>   array_sum($drawNumber) % 2 != 0 ? true : false,
     'Dragon' => self::DT(0, 4, $drawNumber) == "Dragon" ? true : false,
     'Tiger' => self::DT(0, 4, $drawNumber) == "Tiger" ? true : false
   ];return $data[$selection[0]];
  }
  
  
  public static function FirstBall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  $drawNumber[0] >= 6 ? true : false,
     'Small' => $drawNumber[0] <= 6 ? true : false,
     'Even' => $drawNumber[0] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[0] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
    public static function SecondBall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  $drawNumber[0] >= 6 ? true : false,
     'Small' => $drawNumber[0] <= 6 ? true : false,
     'Even' => $drawNumber[0] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[0] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
    public static function ThirdBall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  $drawNumber[0] >= 6 ? true : false,
     'Small' => $drawNumber[0] <= 6 ? true : false,
     'Even' => $drawNumber[0] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[0] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
    public static function FourthBall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  $drawNumber[0] >= 6 ? true : false,
     'Small' => $drawNumber[0] <= 6 ? true : false,
     'Even' => $drawNumber[0] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[0] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }
  
    public static function FifthBall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  $drawNumber[0] >= 6 ? true : false,
     'Small' => $drawNumber[0] <= 6 ? true : false,
     'Even' => $drawNumber[0] % 2 == 0 ? true : false,
     'Odd' => $drawNumber[0] % 2 != 0 ? true : false
    ];return $data[$selection[0]];
  }






    

       
>>>>>>> ff9117e3800249e2248f716721ca30a75227a0b9
}
