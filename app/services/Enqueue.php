//NOTE - do not queue the jobs here, the job will be queued in the Enqueue.php file
// queueing the job here wont help, we need to run all processess no matter what.
// i dont think we need to queue the job here, we just need to run the job as soon as it is received
// the Gearmam worker will run the job as soon as it is received, and will run persistently