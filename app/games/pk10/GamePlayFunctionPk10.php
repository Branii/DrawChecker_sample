<?php 

class GamePlayFunctionPk10 {

    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
      return  [

        #---------------Pk10 Standard----------------

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

        #---------------11x5 2Sides----------------=> waiting for 2side game ids

      ]; 
    }
 }
