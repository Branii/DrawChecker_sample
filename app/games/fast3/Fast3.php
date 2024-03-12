<?php 

class Fast3 extends GamePlayFunctionF3{

    public static function getGamePlayMethod () : Array { //////////// THE INVOKE METHOD
    return parent::getGamePlayFunction();/////////////////////////////////////////////
    }///////////////////////////////////////////////////////////////////////////////////

    public static function Bsoe(Array $selection, Array $drawNumber) : Bool { // must review
        $data = ['1'=>range(11, 18), '2'=>range(3, 10), '3'=> range(1, 9, 2), '4'=> range(0, 8, 2)];
        foreach ($selection[0] as $selectedArray) {
            if (in_array(array_sum($drawNumber), $data[$selectedArray])) {
                return true;
            }
        }
        return false;
    }// fn-> [[3,1,2]],[1, 3, 5] = true

    public static function Sum(Array $selection, Array $drawNumber) : Bool {
        return in_array(array_sum($drawNumber),$selection[0]);
    } //fn-> [1,3,5,9],[1, 3, 5] = true

    public static function Toak(Array $selection, Array $drawNumber) : Bool {
        if (isset($selection[1]) && count(array_count_values($drawNumber)) == 1) return true;
        return in_array(implode(',', $drawNumber),$selection[0]);
    }// fn-> [1,1,1],[1,1,1] = true

    public static function ThreeNoStandard(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection);
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function ThreeNoGroup(Array $selection, Array $drawNumber) : Bool {
        return count(array_intersect($drawNumber,$selection)) == 3;
    }// fn-> [1,2,3,4],[1,1,1] = true

    public static function ThreeRow(Array $selection, Array $drawNumber) : Bool {
        if (isset($selection[1]) && in_array(implode(',',$drawNumber),$selection[1])) return true;
        return in_array(implode(',',$drawNumber),$selection[0]);
    }// fn-> [["1,2,3","2,3,4"],["1,2,3","2,3,4","3,4,5","4,5,6"]],[1,1,1] = true

    public static function HalfStreak(Array $selection, Array $drawNumber) : Bool {
        if (isset($selection[1]) && in_array(implode(',',$drawNumber),$selection[1])) return true;
        return in_array(implode(',',$drawNumber),$selection[0]);
    }// fn-> [[1,1,1],[2,2,2],[3,3,3]],[1,1,1] = true

    public static function Mixed(Array $selection, Array $drawNumber) : Bool {
        if (isset($selection[1]) && in_array(implode(',',$drawNumber),$selection[1])) return true;
        return in_array(implode(',',$drawNumber),$selection[0]);
    }// fn->[[["1,3,5"],["1,3,5","1,3,6","1,4,6","2,4,6"]],[1,1,1] = true

    public static function OnePairStandardManual(Array $selection, Array $drawNumber) : Bool {
        return in_array($drawNumber,$selection[0]);
    }// fn->[[1,1,2],[1,1,3],[2,2,3]],[1,1,2] = true

    public static function OnePairStandardJoint(Array $selection, Array $drawNumber) : Bool {
        $drawNumbers = array_slice($drawNumber, 0, 2);
        return in_array(implode(',',$drawNumbers),$selection[0]) && in_array($drawNumber[2],$selection[1]);
    }// fn->[[[1,1],[2,2],[3,3]],[1,2,3]],[1,1,2] = true

    public static function OnePairGroup(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection[0] as $value) {
            if (self::findDuplicate(explode(',',$value)) == self::findDuplicate($drawNumber)) return true;
        }return false;
    }// fn-> [[2,2],[3,3]],[1,2,2] = true

    public static function TwoNoGroup(Array $selection, Array $drawNumber) : Bool  { // needs review if 111
        $count = (in_array($drawNumber[0], $selection[0]) ? 1 : 0) + 
        (in_array($drawNumber[1], $selection[0]) ? 1 : 0) + 
        (in_array($drawNumber[2], $selection[0]) ? 1 : 0);
        return $count == 2;
    } // fn-> [1,2,3,5],[1,1,1] = true

    public static function TwoNoStandard(Array $selection, Array $drawNumber) : Bool {
        foreach ($selection[0] as $value) {
            if(count(array_intersect(explode(',',$value),$drawNumber)) == 2) return true;
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

    ####################### fast 3 board games ############################

    public static function  SumNumbers(Array $selection, Array $drawNumber):Bool{
   
        $numberGroups = [
            'Big'   => [11, 12,13,14,15,16,17], 
            'Small' => [4, 5, 6,7,8,9,10],
            'Odd'   => [5,7,9,11,13,15] ,
            'Even'  => [4,6,8,10,12,14,16],
        ];
    
        foreach ($selection[0] as $betSelect) {
            if (in_array(array_sum($drawNumber), $numberGroups[$betSelect])) {
                return 1;
            }
        }
         return 0;
      
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    
    public static function  SumDice(Array $selection, Array $drawNumber):Bool{
        $sum = array_sum($drawNumber);
        return  (in_array($sum,$selection[0])) ? "1" :"0" ;
           
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
        
    
    public static function  TwoDice(Array $selection, Array $drawNumber) : Bool {
        sort($drawNumber);  
        $Text = implode('', $drawNumber);
        $data = [
            'Six Six' => strstr($Text,'66') ? true : false,
            'Five Five' => strstr($Text,'55') ? true : false,
            'Four Four' => strstr($Text,'44') ? true : false,
            'Three Three' => strstr($Text,'33') ? true : false,
            'Two Two' => strstr($Text,'22') ? true : false,
            'One One' => strstr($Text,'11') ? true : false,
           
        ];
        return $data[$selection[0]]; 
          

    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    
    public static function  ThreeDice(Array $selection, Array $drawNumber): Bool {
        sort($drawNumber);  
        $Text = implode('', $drawNumber);
        $data = [
            'Six Six Six' => strstr($Text,'666') ? true : false,
            'Five Five Five' =>  strstr($Text,'555') ? true : false,
            'Four Four Four' => strstr($Text,'444') ? true : false,
            'Three Three Three' =>  strstr($Text,'333') ? true : false,
            'Two Two Two' => strstr($Text,'222') ? true : false,
            'One One One' => strstr($Text,'111') ? true : false,
        ];
        
        return $data[$selection[0]];
      
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    
    public static function  ComboDice(Array $selection, Array $drawNumber) :  Bool{
      
        $gameData = [
            '666',
            '555',
            '444',
            '333',
            '222',
            '111',
          ];
    
           sort($drawNumber); 
           $draw = implode("",$drawNumber);  
           foreach ($gameData as $betSelect) {
             if(strstr($draw,$betSelect) !== false) return true; else return false; 
           }
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    
    public static function  AnyTwoDice(Array $selection, Array $drawNumber):Bool{
        sort($drawNumber);  
        $Text = implode('', $drawNumber);
        $data = [
            'Five Six' => strstr($Text,'56') ? true : false,
            'Four Six' => strstr($Text,'46') ? true : false,  
            'Four Five' => strstr($Text,'45') ? true : false,   
            'Three Six' => strstr($Text,'36') ? true : false, 
            'Three Five' =>  strstr($Text,'35') ? true : false,
            'Three Four' =>  strstr($Text,'34') ? true : false,
            'Two Six' =>  strstr($Text,'26') ? true : false,  
            'Two Five' => strstr($Text,'25') ? true : false,
            'Two Four' =>  strstr($Text,'24') ? true : false,
            'Two Three' => strstr($Text,'23') ? true : false,
            'One Six' => strstr($Text,'16') ? true : false,   
            'One Five' => strstr($Text,'15') ? true : false,
            'One Four' => strstr($Text,'14') ? true : false,
            'One Three' =>  strstr($Text,'13') ? true : false,
            'One Two' => strstr($Text,'12') ? true : false,  
        ];
        return $data[$selection[0]];
    }// fn(["Big"],[1,2,3,4,5,6,2]) = true
    
    
    public static function  FullDice(Array $selection, Array $drawNumber): Bool{ // 
        $data = [
            'Six' => in_array(6, $drawNumber) ? 1 : 0,
            'Five' =>  in_array(5, $drawNumber) ? 1 : 0,
            'Four' =>  in_array(4, $drawNumber) ? 1 : 0,
            'Three' =>  in_array(3, $drawNumber) ? 1 : 0,
            'Two' =>  in_array(2, $drawNumber) ? 1 : 0,
            'One' =>  in_array(1, $drawNumber) ? 1 : 0
        ];
        return $data[$selection[0]];
    }
}

// waiting for twoside,board,roadbet



######################### Fast 3  Board Games ##########################

   public static function SumBigSmall(Array $selection, Array $drawNumber){
    $data = [
     'Big' =>  array_sum($drawNumber) >= 11 ? true : false,
     'Small' =>  array_sum($drawNumber) <= 11 ? true : false
    ];
    return in_array(3, array_count_values($drawNumber)) ? false : $data[$selection[0]];
  }
