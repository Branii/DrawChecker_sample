<?php
// require '../database/Database.php';
// require '../services/GameidMap.php';
// require '../services/GameTableMap.php';
// require '../model/Model.php';
// require '../model/Helper.php';

class Utils  extends Database{
    public static function findPattern(Array $pattern, Array $drawNumbers, Int $index, Int $slice) : bool {  // find patterns in drawsNumbers
        $drawNumbers = array_count_values(array_slice($drawNumbers, $index, $slice));
        sort($drawNumbers);sort($pattern);
        return $drawNumbers === $pattern;
    }
    public static function getDate() : String {
        return date('Y-m-d H:i:s');
    }
    public static function findDuplicate($array1) : bool {
        foreach (array_count_values($array1) as $value => $count) {
            if ($count > 1) {
                return true;
            }
        }
        return false;
    }
    public static function getdrawfromapi(String $gameid, Bool $flag = false) : mixed {
        $result = (new Model)->getGameDrawInfo($gameid, false);
        $dataGotten = json_decode(json_encode($result), true);
        return $flag == true ? end($dataGotten): $dataGotten; 
    }
    public static function pushDrawnumbers() : void {
        foreach (GameidMap::get1x0() as $gameid) {
            if(isset(GameTableMap::getGameTableMap()[$gameid])){
                $drawtable = GameTableMap::getGameTableMap()[$gameid]['draw_table'];
                $gameinfo = self::getdrawfromapi($gameid,false);
                (new Model)->ifExist($drawtable,$gameinfo,$gameid) ? '' : 
                (new Model)->insetDrawNumbers($drawtable,$gameinfo,$gameid);
            }
        }        
        //echo "draw number inserted";
    }
    public static function getclosingtime($current_drawtime, $nextdrawseconds, $closingTimeSeconds) : string { // questionable
        // $current_drawtime= strtotime("-$nextdrawseconds seconds", strtotime($current_drawtime));
        $current_drawtime = strtotime("-$closingTimeSeconds seconds", strtotime($current_drawtime));
        $current_drawtime = date("H:i:s", $current_drawtime);
        $clsoingTime = $current_drawtime;
        return $clsoingTime;
    }
    public static function processsPendingBet(Array $betData, String $betTable, String $drawNumber, String $betperiod) : void {
        foreach ($betData as $betSlip) {
            try {
                $betData = unserialize($betSlip['selection_group']);
                $drawNumber = array_map('intval', explode(",", $drawNumber));
                $CLASSFILE  = SELF::findGameMethodOrClass(GameClassFile::getGameClassFile(),$betSlip['lottery_id']); // class name
                $CLASSMETHOD  = SELF::findGameMethodOrClass(GameClassFile::getGameClassFile(),$betSlip['game_id']); // method name
                $result = $CLASSFILE::$CLASSMETHOD( $betData,$drawNumber) ? 'won' : 'lost'; // return win or lost for now
                (new Model)->updateBetSlipStatus($betTable, $betSlip['bid'], $betperiod, implode(",",$drawNumber), $result);
            } catch (\Throwable $th) {
                ExceptionHandler::handleException($th);
                Monolog::logException($th);
            }
        }
    }
    public static function fetchDataInBackground($table, $period): array {
        $pid = pcntl_fork();
        if ($pid == -1) exit("Failed to fork process.");
        elseif ($pid) return;
        else {
            try {
               return (new Model())->getPendingBetSlip($table, $period);
            } catch (Exception $th) {
                Monolog::logException($th);
            }
            exit();
        }
    }

    public static function findGameMethodOrClass(array $methodOrClassIdGroups, string $methodOrClassId): ?string {
        foreach ($methodOrClassIdGroups as $group => $value) {
            if (in_array($methodOrClassId, explode(",", $group))) {
                return $value;
            }
        }
        return null; // Return null if no matching group is found
    }

}

