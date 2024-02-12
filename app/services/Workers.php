<?php 

 class Workers {
    public static function getWorkers() : Array {  // modify this function to return the workers and their respective job execution process
      return  [
            ['worker22', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload); }],
            ['worker23', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload); }],
            ['worker25', function ($workload) { MyGearmanWorker::JobExecutionProcess($workload); }]
      ];
    }

}