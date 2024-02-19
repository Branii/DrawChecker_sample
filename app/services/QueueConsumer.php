<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use Beanstalk\Client;

class QueueConsumer { // queue the game draws
    private static $client;

    public function __construct(Array $serverAddress){ // create the server
        self::$client = new Client($serverAddress);
        self::$client->connect();
    }

    public static function QueueExecutionProcess(String $queueName): never { // get jobs from queue holder and process them with workers
        self::$client->watch($queueName);
        //echo $queueName;
        while (true){
            $job = self::$client->reserve(); // Block until job is available.
            // Now $job is an array which contains its ID and body:
            // ['id' => 123, 'body' => 'str_job_data']
            $workLoad = $job['body'];
            
            if ($workLoad) {  // Processing of the job...
                (new MyGearmanClient('127.0.0.1:4730'))->submitJobToWorker($queueName , json_encode($workLoad)); 
                self::$client->delete($job['id']);
            } else {
                Monolog::logException(new Exception('workLoad is empty.'));
                self::$client->bury($job['id'],10);
            }
        }
    }

    public function disconnect() : null {
        $this->client->disconnect();
        return $this->client = null;
    }

    public function startConsumers($executeJob) { // Start a new queue for a job on a separate process
        $pid = pcntl_fork();
        if ($pid == -1) {
            die("Failed to fork process.");
        } elseif ($pid) {
            // Parent process
            return;
        } else {
            // Child process
            (new QueueConsumer(Config::getQueueServerAddress()))->QueueExecutionProcess($executeJob);
            exit(); // Exit the child process after queue is started
        }
    }
}
//connect to the Beanstalk Server
//(new QueueConsumer(Config::getQueueServerAddress()))->QueueExecutionProcess('queue25'); Testing for 1 queue

// Start a queue for each job in a separate process
foreach (QueueHolders::getQueueContainer() as $queueName => $executeJob) { // QueueHolders::getQueueContainer() is a static method that returns an array of queues and their queuing method
    (new QueueConsumer(Config::getQueueServerAddress()))->startConsumers($executeJob);
    echo "Started QueueHolder for $executeJob" . PHP_EOL;
}

// Wait for all child processes to exit
while (pcntl_waitpid(0, $status) != -1);



