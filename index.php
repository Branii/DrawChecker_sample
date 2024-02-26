<?php
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use React\EventLoop\Factory;
$loop = Factory::create();

// var_dump(Utils::getdrawfromapi(1,false));
// exit;
$loop->addPeriodicTimer(1,function (){

    echo $currentTime = date('H:i:s');
    if(isset(Timer::time1x0()[$currentTime])){ // run all 1min games
        $res = Utils::pushDrawnumbers(GameIdMap::get1x0());
        $res == 'done' ? Checker::Check(GameIdMap::get1x0(),"worker1x0") : ''; // store all 1min games into queue
    }

    // if(isset(Timer::time1x5()[ $currentTime])){ // run all 1.5min games
    //     Checker::check(GameIdMap::get1x5());
    // }

    // if(isset(Timer::time3x0()[ $currentTime])){ // run all 3min games
    //     Checker::check(GameIdMap::get3x0());
    // }

    // if(isset(Timer::time5x0()[ $currentTime])){ // run all 5min games
    //     Checker::check(GameIdMap::get5x0());
    // }

});
 
echo "Server started\n";
//Start the event loop
$loop->run();
