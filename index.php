<?php
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use React\EventLoop\Factory;
$loop = Factory::create();


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
