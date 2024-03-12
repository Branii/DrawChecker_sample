<?php 
class GamePlayFunctionPk10 {

    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
      return  [

        #---------------Pk10 Standard----------------

           '358' => 'FirstOneStraightJoint',
           '359' => 'FirstTwoStraightJoint',
           '361' => 'FirstThreeStraightJoint',
           '363' => 'FirstFourStraightJoint',
           '365' => 'FirstFiveStraightJoint',
           '360' => 'FirstTwoStraightManual',
           '362' => 'FirstThreeStraightManual',
           '364' => 'FirstFourStraightManual',
           '366' => 'FirstFiveStraightManual',
           '367' => 'FirstFiveFixedPlace',
           '368' => 'LastFiveFixedPlace', 
           '369' => 'DragonTiger',
           '370' => 'pick2Joint',
           '371' => 'pick2Manual',
           '372' => 'pick3Joint',
           '373' => 'pick3Manual',
           '374' => 'BseoFirst5',
           '375' => 'BsoeTopTwo',
           '376' => 'SumOfTopTwo',
           '378' => 'SumOfFirstThree',

        #---------------PK10 2Sides----------------=> waiting for 2side game ids


        #---------------PK10 Bord Games----------------=> 
            '1' => 'FarwardAndBack',
            '2' => 'GuessTheWinner',
            '3' => 'MaximumValue',
            '4' => 'MinimumValue',
            '5' => 'QuickOrSlow',

        #---------------PK10 Bord Games----------------=> 

            '1116,1117' => 'SumOfFirstTwo',
            '1128,1138,1118' => 'BigSmallFirstBall',
            '1129,1139,1119' => 'BigSmallSecondBall',
            '1130,1140,1120' => 'BigSmallThirdBall',
            '1131,1141,1121' => 'BigSmallFourthBall',
            '1132,1142,1122' => 'BigSmallFifthBall',
            '1133,1143' => 'BigSmallSixBall',
            '1134,1144' => 'BigSmallSevenBall',
            '1135,1145' => 'BigSmallEightBall',
            '1136,1146' => 'BigSmallNineBall',
            '1137,1147' => 'BigSmallTenBall',

      ]; 
    }
 }

