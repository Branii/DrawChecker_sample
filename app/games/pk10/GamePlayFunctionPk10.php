<?php 

class GamePlayFunctionPk10 {
    
    public static function getGamePlayFunction() : Array {  // Game Ids and their respective checker function
        return  [
  
          #---------------Pk10 Standard----------------
  
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
             '423' => 'GuessANumber'
  
          #---------------2Sides----------------=> waiting for 2side game ids
  
        ]; 
      }

}