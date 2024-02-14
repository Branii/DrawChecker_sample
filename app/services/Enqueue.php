<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use Pheanstalk\Pheanstalk as QueueMan;
use Pheanstalk\Values\TubeName;

class Enqueue { // queue the game draws
    private $QueueGuy;
    private $tube;
    public function __function($serverAddress){
        $this->QueueGuy = new QueueMan($serverAddress);
        $this->tube     = new TubeName('testtube');
    }

    public function addJobToQueue(String $queueName, String $job){
        $this->QueueGuy->useTube($this->tube);
        $this->QueueGuy->put($job);
        echo "Job added to the queue";//
    }

    public function getJobFromQueue(){

    }
}
//connect to the Beanstalk Server
$enqueue = new Enqueue("127.0.0.1:11300");
var_dump($enqueue->addJobToQueue("testtube", "testjob"));