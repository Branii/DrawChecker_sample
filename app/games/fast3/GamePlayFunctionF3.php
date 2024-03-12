<?php

 class GamePlayFunctionF3 {
    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
      return  [

        #---------------Fast3 Standard----------------=>

           '390' => 'Bsoe',
           '393' => 'Sum',
           '394' => 'Toak',
           '405' => 'ThreeNoStandard',
           '406' => 'ThreeNoGroup',
           '410' => 'ThreeRow',
           '411' => 'HalfStreak',
           '413' => 'Mixed',
           '414' => 'OnePairStandardManual',
           '417' => 'OnePairStandardJoint',
           '418' => 'OnePairGroup', 
           '419' => 'TwoNoGroup', 
           '420' => 'TwoNoStandard',
           '423' => 'GuessANumber',

        #---------------Fast3 2Sides----------------=> waiting for 2side game ids

        #---------------Fast3 Board Games----------------=>
            '1' => 'SumNumbers',
            '2' => 'SumDice',
            '3' => 'TwoDice',
            '4' => 'ThreeDice',
            '5' => 'ComboDice',
            '6' => 'AnyTwoDice',
            '7' => 'FullDice',

        #---------------Fast3 Road Bet----------------=>
           '1148' => 'SumBigSmall'



      ]; 
    }
 }