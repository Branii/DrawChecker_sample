<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use Beanstalk\Client;

class QueueProducer { // queue the game draws
    private $client;
    public function __construct(Array $serverAddress){ // create the server
        $this->client = new Client($serverAddress);
        $this->client->connect();
    }

    public function addJobToQueue(String $queueName, String $job) : string{ // add jobs to queue
        $this->client->useTube($queueName);
        $this->client->put(
            0, // priority
            0, // delay
            60, // execution time
            $job // data
        );
        return "Job added to the queue" . $queueName;//
    }

    public function disconnect() : null {
        $this->client->disconnect();
        return $this->client = null;
    }
}
//connect to the Beanstalk Server for testing
//$enqueue = new QueueProducer(Config::getQueueServerAddress());

