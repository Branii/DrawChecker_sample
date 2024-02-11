<?php 
require $_SERVER['DOCUMENT_ROOT']. '/checker/includer.php';
// Execute a PHP file and capture its output
$output = [];
$return_var = 0;

exec('/usr/local/bin/php '. $_SERVER['DOCUMENT_ROOT']. '/checker/index.php 2>&1 ', $output, $return_var);
var_dump($output);

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