<?php 
// Execute a PHP file and capture its output
$output = [];
$return_var = 0;
exec('php /app/services/MyGearmanWorker.php', $output, $return_var);

// Check if the execution was successful
if ($return_var === 0) {
    // The execution was successful, do something with the output
    echo "Execution successful. Output: " . implode("\n", $output);
    $pid = (int)$output[0];
    var_dump($pid);
} else {
    // The execution failed
    echo "Execution failed with return code: $return_var";
}