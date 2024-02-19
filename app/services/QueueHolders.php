<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
 class QueueHolders {

  public static function getQueueContainer() : Array {  // Queues and their respective game data
      return  [
        'worker20' => 'worker20',
        'worker23' => 'worker23',
        'worker25' => 'worker25'
    ]; 
  }

}