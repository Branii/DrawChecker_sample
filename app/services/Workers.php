<?php 

 class Workers {
    public static function getWorkers() : Array {  // Workers and their respective job execution process
      return  [
           ['worker1x0', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
           ['worker1x5', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
           ['worker3x0', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
           ['worker5x0', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
      ]; 
    }
}