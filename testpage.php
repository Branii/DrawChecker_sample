<?php 
require_once(__DIR__ . "/test_data_small.php");
// require_once(__DIR__ . "/Database.php");
// Checker::Royal5Standard('20233012001');
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
// function getdrawfromapi(String $gameid, Bool $flag = false) : array {
//     $url = "http://192.168.199.120/task/cron/draw_api.php?gameid=" . $gameid;
//     $response  = file_get_contents($url);
//     $result = json_decode($response, true);
//     return $flag == true ? end($result) : $result;
// }

function runner($param){ // number of times to insert data
    echo "Inserting test data please wait...";
    $data = (new test_data_small)->loadTestData();
    for ($i=0; $i < $param; $i++) { 
        $data = (new test_data_small)->loadTestData();
        //(new Model)->insertTestBetData($data[0], 'bet');
        var_dump($data[0]);
     
    }
    echo "Test data inserted";
};runner(500); #NOTE - this is a test function, it will insert 50,000 records into the database




