<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
 class QueueHolders {

  public static function getQueueContainer() : Array {  // Queues and their respective game data
    return  [
        'worker1x0',
        'worker1x5',
        'worker3x0',
        'worker5x0',
    ]; 
  }

}