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
           '484' => 'pickJoint2x2',
           '486' => 'pickJoint3x3',
           '488' => 'pickJoint4x4',
           '490' => 'pickJoint5x5',
           '492' => 'pickJoint5x6',
           '494' => 'pickJoint5x7',
           '496' => 'pickJoint5x8',

        #---------------11x5 2Sides----------------=> waiting for 2side game ids

      ]; 
    }
 }
