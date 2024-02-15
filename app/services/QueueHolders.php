<?php 

 class QueueHolders {
  public static function getQueueContainer() : Array {  // Queues and their respective game data
    return  [
          ['queue22', function ($queueName,$gameId) { QueueConsumer::QueueExecutionProcess($queueName,$gameId);}],
          ['queue23', function ($queueName,$gameId) { QueueConsumer::QueueExecutionProcess($queueName,$gameId);}],
          ['queue25', function ($queueName,$gameId) { QueueConsumer::QueueExecutionProcess($queueName,$gameId);}]
    ]; 
  }

}