<?php
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use React\EventLoop\Factory;
$loop = Factory::create();


require 'Calculator.php';

var_dump( Calculator::calculate(2,4,'divide')); // I am singing
//var_dump(Utils::getdrawfromapi(1, true));
//getdrawfromapi(String $gameid, Bool $flag = false)

//var_dump(Utils::getdrawfromapi(25, false));
// var_dump((new MyGearmanClient('127.0.0.1:4730'))->submitJobToWorker('worker2', 'FooData'));



$loop->addPeriodicTimer(1,function (){
    

    echo $currentTime = date('H:i:s');
    if(isset(Timer::time1x0()[ $currentTime])){ // run all 1min games
        Utils::pushDrawnumbers();
        Checker::Check(GameidMap::get1x0());
    }

    // if(isset(Timer::time1x5()[ $currentTime])){ // run all 1.5min games
    //     Checker::check(GameidMap::get1x5());
    // }

    // if(isset(Timer::time3x0()[ $currentTime])){ // run all 3min games
    //     Checker::check(GameidMap::get3x0());
    // }

    // if(isset(Timer::time5x0()[ $currentTime])){ // run all 5min games
    //     Checker::check(GameidMap::get5x0());
    // }

});
 
echo "Server started\n";
//Start the event loop
$loop->run();
