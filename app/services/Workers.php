<?php 

 class Workers {
    public static function getWorkers() : Array {  // Workers and their respective job execution process
      return  [
           // ['worker22', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
           // ['worker23', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}],
            ['worker25', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload);}]
      ]; 
    }
}