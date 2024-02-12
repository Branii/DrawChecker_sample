<?php 

class ExtraNo { 

    public function extraNumber($drawNumber,$betData) : bool {
        $lastValue  =  end($drawNumber);
        return (in_array($lastValue,$betData) ? true : false);
    }

    public function extraHeadTail($drawNumber,$betData) : bool { // 1 or more
        $lastValues = end($drawNumber);
        $splited = str_split($lastValues);
        list($headValue,$tailValue) = $splited;
        $headResult   =  in_array($headValue, $betData[0]);
        $tailResult   =  in_array($tailValue, $betData[1]);
        return ($headResult && $tailResult) ? true : ($headResult ? true : ($tailResult ? true : false));
    }

}




class Color{
    public function colorBalls($drawNumber,$betData) :bool {
    
        $data = [
          'red'   => [1 ,3 ,7 ,8 ,12 ,13 ,18 ,19 ,23 ,24 ,29 ,30 ,34 ,35 ,40 ,45 ,46], 
          'blue'  => [3 ,4 ,9 ,10 ,14 ,15 ,20 ,25 ,26 ,31 ,36 ,37 ,41 ,42 ,47 ,48],
          'green' => [5 ,6 ,11 ,16 ,17 ,21 ,22 ,27 ,28 ,32 ,33 ,38 ,39 ,43 ,44 ,49]
        ];
        
        if(count($betData) > 1){
          $bets = [];
          foreach($betData as $bet){
            in_array(end($drawNumber),$data[$bet]) ? array_push($bets,true) : "" ;
          } return $bets;
          
        }else{
          $firstValue = $betData[0];
          return in_array(end($drawNumber),$data[$firstValue]) ? true : false;
        }
        
        return false;

        
    }

      public  function twocolorBalls($drawNumber,$betData) {
        $data = [
        'big red'     =>  [29,30,34,40,45,46], 
        'small red'   =>  [1,2,7,8,12,13,18,19,23,24],
        'odd red'     =>  [1,7, 13, 19, 23, 29, 35, 45],
        'even red'    =>  [2, 8, 12, 18, 24, 30, 34, 40, 46], 
        'big blue'    =>  [25, 26, 31, 36, 37, 41, 42, 47, 48], 
        'small blue'  =>  [3,4,9, 10, 14, 15, 20],
        'odd blue'    =>  [3,9, 15, 25, 31, 37, 41, 47],
        'even blue'   =>  [4, 10, 14, 20, 26, 36, 42, 48], 
        'big green'   =>  [27, 28, 32, 33, 38, 39, 43, 44], 
        'small green' =>  [5, 6, 11, 16, 17, 21, 22],
        'odd green'   =>  [5, 11, 17, 21, 27, 33, 39, 43],
        'even green'  =>  [6, 16, 22, 28, 32, 38, 44], 
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
