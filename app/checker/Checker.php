<?php 
ini_set('memory_limit', '256M');
class Checker { // checker class

  public static function Check(Array $gameIds, String $queueName) { # recieve game ids from gamesIdMap class

      try {

        foreach ($gameIds as $gameId) {

          $gameDrawInfo = Utils::getdrawfromapi($gameId);
          $workLoad = [
            'drawNumber' => $gameDrawInfo['draw_number'], 
            'betPeriod'  => $gameDrawInfo['draw_date'], 
            'betTable'   => GameTableMap::getGameTableMap()[$gameId]['bet_table']
          ];

          echo (new QueueProducer(Config::getQueueServerAddress()))->addJobToQueue($queueName, json_encode($workLoad)); // send to beanstalk queue
         
        }
      } catch (\Throwable $th) {
        ExceptionHandler::handleException($th);
        Monolog::logException($th);
      }
      
  }
}

