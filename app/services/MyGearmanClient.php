<?php 
require $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php'; 
use \Kicken\Gearman\Client;
class MyGearmanClient {
    private $client;
    private $job;

    public function __construct($serverAddress) {
        $this->client = new Client($serverAddress);
    }

    public function submitJobToWorker(String $workerName, String $workload) {
        $job = $this->client->submitBackgroundJob($workerName, $workload);
        echo "Job submitted!" . $job;
    }
}