<?php 
// require_once(__DIR__ . "/Checker.php");
// require_once(__DIR__ . "/Database.php");
// Checker::Royal5Standard('20233012001');

function getdrawfromapi(String $gameid, Bool $flag = false) : array {
    $url = "http://192.168.199.120/task/cron/draw_api.php?gameid=" . $gameid;
    $response  = file_get_contents($url);
    $result = json_decode($response, true);
    return $flag == true ? end($result) : $result;
}

var_dump(getdrawfromapi('1', false));

