<?php

 class GamePlayFunction11x5 {
    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
      return  [

        #---------------11x5 Standard----------------

           '469' => 'f3straightJoint',
           '470' => 'f3straightManual',
           '474' => 'f3groupJoint',
           '475' => 'f3straightManual',
           '476' => 'f2straightJoint',
           '477' => 'f2straightManual',
           '478' => 'f2groupJoint',
           '479' => 'f2groupManual',
           '480' => 'anyPlace',
           '481' => 'fixedPlace',
           '482' => 'pickJoint1x1', 
           '484' => 'pickJoint2x2',
           '486' => 'pickJoint3x3',
           '488' => 'pickJoint4x4',
           '490' => 'pickJoint5x5',
           '492' => 'pickJoint5x6',
           '494' => 'pickJoint5x7',
           '496' => 'pickJoint5x8',
           '483' => 'pickManual1x1', 
           '485' => 'pickManual2x2',
           '487' => 'pickManual3x3',
           '489' => 'pickManual4x4',
           '491' => 'pickManual5x5',
           '493' => 'pickManual5x6',
           '495' => 'pickManual5x7',
           '497' => 'pickManual5x8',
           '498' => 'fixedDigit2x2', 
           '499' => 'fixedDigit3x3',
           '500' => 'fixedDigit4x4',
           '501' => 'fixedDigit5x5',
           '502' => 'fixedDigit5x6',
           '503' => 'fixedDigit5x7',
           '504' => 'fixedDigit5x8',
           '505' => 'funOddEven',
           '506' => 'funTheMiddleNo',

        #---------------11x5 2Sides----------------=> waiting for 2side game ids


       #---------------11x5 Board Games-------------=> 

           '1' => 'UpperAndLowerPlate',
           '2' => 'OddandEvenDisk',
           '3' => 'GuessTheNumberMiddle',
           '4' => 'GuessTheNumberSum',

      #---------------11x5 Road bet----------------=> 

         '1181' => 'SumAllDrawNumber',
         '1182' => 'SumAllDrawNumber',
         '1180' => 'SumAllDrawNumber',

         '1170' => 'FirstBall',
         '1175' => 'FirstBall',


         '1171' => 'SecondBall',
         '1176' => 'SecondBall',

         '1172' => 'ThirdBall',
         '1177' => 'ThirdBall',

         '1173' => 'FourthBall',
         '1178' => 'FourthBall',

         '1174' => 'FifthBall',
         '1179' => 'FifthBall',

      ]; 
    }
 }
