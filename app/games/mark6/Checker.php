<?php 
ini_set('memory_limit', '256M');
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
#requie all the necessary files
class Checker extends Selectors { // 

  private static $batchSize = 100;
  private static $offset = 0;

  public static function Check(Array $gameIDs) { # 5D games

      try {

        foreach ($gameIDs as $gameID) {

          $gameDrawInfo = Utils::getdrawfromapi($gameID);
          $workLoad = [
            'drawNumber' => $gameDrawInfo['drawnumber'], 
            'betPeriod' => $gameDrawInfo['betperiod'], 
            'betTable' => GameTableMap::getGameTableMap()[$gameID]
          ];
          (new MyGearmanClient('127.0.0.1:4730'))->submitJobToWorker('worker'.$gameID , json_encode($workLoad)); // send to gearman workers
          
        }

      } catch (\Throwable $th) {
        ExceptionHandler::handleException($th);
        Monolog::logException($th);
      }

  }

}

