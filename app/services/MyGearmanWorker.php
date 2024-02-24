<?php 
require $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php'; 
require $_SERVER['DOCUMENT_ROOT'] . 'includer.php';
use \Kicken\Gearman\Worker;
use \Kicken\Gearman\Job\WorkerJob;
class MyGearmanWorker {
    private $worker;

    public function __construct($serverAddress) { // serverAddress is the address of the gearman server
        $this->worker = new Worker($serverAddress);
    }

    public static function createWorker($server, $workerName, $executeJob) { // Create a worker for a job
        $worker = new Worker($server);
        $worker->registerFunction($workerName, function ($job) use ($executeJob) {
            $workload = $job->getWorkload();
            return $executeJob($workload);
        });
        return $worker;
    }

    public static function JobExecutionProcess($workload) { // Job execution process
        if ($workload) {
            $betData = json_decode($workload,true);
            list($drawNumber,$betPeriod,$betTable) = array_values($betData);

            try {
                $TotalBets = Utils::fetchDataInBackground($betTable,$betPeriod);
                Utils::processsPendingBet($TotalBets, $betTable, $drawNumber, $betPeriod);
            } catch (\Throwable $th) {
                Monolog::logException($th); // Log exception
            }

            // while ($TotalBets = Utils::fetchDataInBackground($betTable,$betPeriod)) {
             
            //     foreach ($TotalBets as $bets) {
                   
            //         try {
            //             Utils::processsPendingBet($bets, $betTable, $drawNumber, $betPeriod);
            //         } catch (\Throwable $th) {
            //             Monolog::logException($th); // Log exception
            //         }
            //     }

            // }
            #return job status to gearman server here if you want.
            return "Job done!" . PHP_EOL;
        }
    }

    public function startWorker($server, $workerName, $executeJob) { // Start a worker for a job on a separate process
        $pid = pcntl_fork();
        if ($pid == -1) {
            die("Failed to fork process.");
        } elseif ($pid) {
            // Parent process
            return;
        } else {
            // Child process
            $worker = self::createWorker($server, $workerName, $executeJob);
            $worker->work();
            exit(); // Exit the child process after work is done
        }
    }

}

// Start a worker for each job in a separate process
foreach (Workers::getWorkers() as [$workerName, $executeJob]) { // Workers::getWorkers() is a static method that returns an array of workers and their executeJob method
    (new MyGearmanWorker('127.0.0.1:4730'))->startWorker('127.0.0.1:4730', $workerName, $executeJob);
    echo "Started worker for $workerName" . PHP_EOL;
}

// Wait for all child processes to exit
while (pcntl_waitpid(0, $status) != -1);
