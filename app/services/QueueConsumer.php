<?php 
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use Beanstalk\Client;

class QueueConsumer { // queue the game draws
    private $client;

    public function __construct(Array $serverAddress){ // create the server
        $this->client = new Client($serverAddress);
        $this->client->connect();
    }

    public static function QueueExecutionProcess(String $queueName, String $gameId){ // get jobs from queue holder and process them with workers
        self::$client->watch($queueName);
        while (true){
            $job = self::$client->reserve(); // Block until job is available.
            // Now $job is an array which contains its ID and body:
            // ['id' => 123, 'body' => '/path/to/cat-image.png']
            $workLoad = $job['body'];
            if ($workLoad) {  // Processing of the job...
                (new MyGearmanClient('127.0.0.1:4730'))->submitJobToWorker("worker".$gameId , json_encode($workLoad)); 
                self::$client->delete($job['id']);
            } else {
                Monolog::logException(new Exception('workLoad is empty.'));
                self::$client->bury($job['id']);
            }
        }
    }

    public function disconnect() : null {
        $this->client->disconnect();
        return $this->client = null;
    }

    public function startConsumers($server, $queueName, $executeJob) { // Start a new queue for a job on a separate process
        $pid = pcntl_fork();
        if ($pid == -1) {
            die("Failed to fork process.");
        } elseif ($pid) {
            // Parent process
            return;
        } else {
            // Child process
            $worker = self::startConsumers($server, $queueName, $executeJob);
            $worker->work();
            exit(); // Exit the child process after work is done
        }
    }
}
//connect to the Beanstalk Server
//(new QueueConsumer(Config::getQueueServerAddress()))->getJobFromQueue('queue25');

// Start a worker for each job in a separate process
foreach (QueueHolders::getQueueContainer() as [$queueName, $executeJob]) { // QueueHolders::getQueueContainer() is a static method that returns an array of queues and their queuing method
    (new QueueConsumer(Config::getQueueServerAddress()))->startConsumers(Config::getQueueServerAddress(), $workerName, $executeJob);
    echo "Started QueueHolder for $queueName" . PHP_EOL;
}

// Wait for all child processes to exit
while (pcntl_waitpid(0, $status) != -1);



