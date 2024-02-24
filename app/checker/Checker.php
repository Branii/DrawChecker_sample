<?php 
ini_set('memory_limit', '256M');
class Checker { // checker class

  private static $batchSize = 100;
  private static $offset = 0;

  public static function Check(Array $gameIDs, String $queueName) { # recieve game ids from gamesIdMap class

      try {

        //$queueName = GameTableMap::getDrawQueueName()[$minSent]; // get draw table

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

