<?php 
class GamePlayFunctionHappy8 {

    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
      return  [

        #---------------Happy8 Standard----------------

           '462' => 'PickOne',
           '463' => 'PickTwo',
           '464' => 'PickThree',
           '465' => 'PickFour',
           '466' => 'PickFive',
           '467' => 'PickSix',
           '468' => 'PickSeven',
           '471' => 'FunOverUnder',
           '472' => 'FunOddEven',
           '473' => 'FunSum',

        #---------------Happy8 2Sides------------------=> waiting for 2side game ids

        #---------------Happy8 Board Games-------------=> waiting for 2side game ids
         
          '1' => 'BigAndSmall',
          '2' => 'SuperirrMiddelLower',
          '3' => 'OddTieEven',
          '4' => 'BOSOBESE',
          '5' => 'GoldAndOthers',


        #---------------Happy8 Road Bet ---------------=> 
          '1232' => 'SumBigSmallOddEven',
          '1233' => 'SumBigSmallOddEven',
          '1234' => 'SumBigSmallOddEven',
          '1235' => 'SumBigSmallOddEven'

      ]; 
    }
 }
