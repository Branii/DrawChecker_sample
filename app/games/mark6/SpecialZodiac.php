<?php 

class SpecialZodiac {

    public function comboZodiac ($drawNumber,$betData) : mixed {
        $lastValue = end($drawNumber);
        return $lastValue == "49" ? "refund" : (in_array($lastValue, $betData) ? true : false);
    }

    public function specialZodiac ($drawNumber,$betData) : bool {
        $lastValue = end($drawNumber);
        return in_array($lastValue, $betData) ? true : false;
    }

    public function elementFive ($drawNumber,$betData) : bool {
        $lastValue = end($drawNumber);
        return in_array($lastValue, $betData) ? true : false;
    }

    public function formExtraNumber ($drawNumber,$betData) : mixed {
        $lastValue = end($drawNumber);
        return $lastValue == "49" ? "refund" : (in_array($lastValue, $betData) ? true : false);
    }

    public function sumExtraHeadTail ($drawNumber,$betData) : mixed { // 1 or more
        $data = [
            'small' => [1,2,3,4,5,6],
            'big'   => [7,8,9.10,11,12],
            'even'  => [0,2,4,6,8],
            'odd'   => [1,3,5,7,9]
            ];
            if(end($drawNumber) == "49"){
                return "refund";
              }else{
                if(count($betData) > 1){
                    $bets = [];
                    foreach($betData as $bet){
                      $sum = array_sum(str_split(end($drawNumber)));
                      in_array($sum,$data[$bet]) ? array_push($bets,true) : "" ;
                    } return $bets;
                    
                  }else{
                    $firstValue = $betData[0];
                    $sum = array_sum(str_split(end($drawNumber)));
                    return in_array($sum,$data[$firstValue]) ? true : false;
                  }
                  
              }
             
          
    }


     public  function formextraTail($drawNumber,$betData) :mixed { // 1 or more wins
        $data = [
        'small' => [0,1,2,3,4],
        'big'   => [5,6.7,8,9],
        'even'  => [0,2,4,6,8],
        'odd'   => [1,3,5,7,9]
        ];
        if(end($drawNumber) == "49"){
          return "refund";
        }else{
          $lastValues = end($drawNumber);
          $splited    = str_split($lastValues);
          if(count($betData) > 1){
          $bets = [];
          foreach($betData as $bet){
          $splited = str_split($lastValues);
            in_array($splited[1],$data[$bet]) ? array_push($bets,true) : "" ;
          } return $bets;
          
        }else{
          $firstValue = $betData[0];
          $splited = str_split($lastValues);
          return in_array($splited[1],$data[$firstValue]) ? true : false;
        }
        }
    }

    public function formextraZodiac($drawNumber,$betData) { // one or more wins
  
        $data = [
           'zodiac sky'     => [1, 3, 5, 8, 10, 12, 13, 15, 17, 20, 22, 24, 25, 27, 29, 32, 34, 36, 37, 39, 41, 44, 46, 48], 
           'zodiac ground'  => [4, 6, 7, 9, 11, 14, 16, 18, 19, 21, 23, 26, 28, 30, 31, 33, 35, 38, 40, 42, 43, 45, 47],
           'zodiac first'   => [1, 2, 3, 4, 11, 12, 13, 14, 15, 16, 23, 24, 25, 26, 27, 28, 35, 36, 37, 38, 39, 40, 47, 48],
           'zodiac poultry' => [3, 5, 6, 7, 9, 10, 15, 17, 18, 19, 21, 22, 27, 29, 30, 31, 33, 34, 39, 41, 42, 43, 45, 46],
           'zodiac last'    => [5, 6, 7, 8, 9, 10, 17, 18, 19, 20, 21, 22, 29, 30, 31, 32, 33, 34, 41, 42, 43, 44, 45, 46],
           'zodiac beast'   => [1, 2, 4, 8, 11, 12, 13, 14, 16, 20, 23, 24, 25, 26, 28, 32, 35, 36, 37, 38, 40, 44, 47, 48]
            ];
        
       
            if(end($drawNumber) == "49"){
                return "refund";
            }else{
              
                if(count($betData) > 1){
                    $bets = [];
                    foreach($betData as $bet){
                    in_array(end($drawNumber),$data[$bet]) ? array_push($bets,true) : "" ;
                    } return $bets;
                    
                }else{
                    $firstValue = $betData[0];
                    return in_array(end($drawNumber),$data[$firstValue]) ? true : false;
                }
      
              }
            }



}