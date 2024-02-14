<?php 
ini_set('memory_limit', '256M');
class Checker { // checker class

  private static $batchSize = 100;
  private static $offset = 0;

  public static function Check(Array $gameIDs) { # recieve game ids from gamesIdMap class

      try {

        foreach ($gameIDs as $gameID) {
          $gameDrawInfo = Utils::getdrawfromapi($gameID);
          $workLoad = [
            'drawNumber' => $gameDrawInfo['draw_number'], 
            'betPeriod'  => $gameDrawInfo['draw_date'], 
            'betTable'   => GameTableMap::getGameTableMap()[$gameID]['bet_table']
          ];
          (new MyGearmanClient('127.0.0.1:4730'))->submitJobToWorker("worker".$gameID , json_encode($workLoad)); // send to gearman workers
        }//  [1,3,4,6,7,10,13,25,27]

      } catch (\Throwable $th) {
        ExceptionHandler::handleException($th);
      }
  }

}

