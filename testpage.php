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

echo "Inserting test data please wait...";
$data = (new test_data_small)->loadTestData();
foreach($data as $json){
    (new Model)->insertTestBetData($json, 'bt_rapidmark6');
}
echo "Done";




