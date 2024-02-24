<?php 
ini_set('memory_limit', '256M');
class Checker { // checker class

  public static function Check(Array $gameIDs, String $queueName) { # recieve game ids from gamesIdMap class

      try {
        
        foreach ($gameIDs as $gameID) {

          $gameDrawInfo = Utils::getdrawfromapi($gameID);
          $workLoad = [
            'drawNumber' => $gameDrawInfo['draw_number'], 
            'betPeriod'  => $gameDrawInfo['draw_date'], 
            'betTable'   => GameTableMap::getGameTableMap()[$gameID]['bet_table']
          ];

          echo (new QueueProducer(Config::getQueueServerAddress()))->addJobToQueue($queueName, json_encode($workLoad)); // send to beanstalk queue
        }
      } catch (\Throwable $th) {
        ExceptionHandler::handleException($th);
      }
  }

}

