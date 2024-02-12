<?php  

class Model extends Database {
    
    public function getPendingBetSlip(String $betTable, String $betperiod, Int $batchSize, Int $offset) : array {

        $sql = "SELECT * FROM $betTable WHERE bet_status = 'pending' LIMIT $offset, $batchSize";
        $stmt = Database::openLink('testdb')->prepare($sql);
        $stmt->execute();$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Database::closeLink();return $result;

    }


    public function insetDrawNumbers(String $drawtable, Array $gameInfo, String $gameid) : void { // we can do more with this method

        $drawNumber = json_encode(explode(',',$gameInfo['draw_number']));
        $sql = "INSERT INTO $drawtable (draw_number, date_created, raw_date, time_added, draw_status, bet_period, lottery_type, opening_time, closing_time, draw_count) VALUES (:draw_number, :date_created, :raw_date, :time_added, :draw_status, :period, :lottery_type, :opening_time, :closing_time, :draw_count)";
        (new Helper)->insert($sql, ['draw_number'=>$drawNumber, 'date_created'=>date('Y-m-d H:i:s'), 'raw_date'=>$gameInfo['draw_date'], 'time_added'=>date('H:i:s'), 'draw_status'=>'pending', 'bet_period'=>$gameInfo['draw_date'], 'lottery_type'=>$gameid, 'opening_time'=>$gameInfo['draw_time'], 'closing_time'=>$gameInfo['draw_time'], 'draw_count'=>count(explode(',',$gameInfo['draw_number']))]);
        echo "draw numbers inserted";
        
    }
    public function updateBetSlipStatus(String $betTable, String $betId, String $betPeriod, String $drawNumber, String $betStatus) : void { // we can do more with this method
      
       try {

        $drawNumber = json_encode(explode(',',$drawNumber));
        $sql = "UPDATE $betTable SET bet_status = :bet_status, draw_number = :draw_number WHERE bid = :bid AND draw_period = :draw_period";
        (new Helper)->update($sql, ['bet_status'=>$betStatus,'draw_number'=>$drawNumber, 'bid'=>$betId, 'draw_period'=>$betPeriod]);
        
       } catch (\Throwable $th) {
        Monolog::logException($th);
       }
        
    }

    public function ifExist(String $drawtable, Array $gameInfo, String $gameid) : bool { // ensure we have a unique draw number, returns boolean

        $sql = "SELECT * FROM $drawtable WHERE period = :period";
        $result = (new Helper)->selectAll($sql, ['period'=>$gameInfo['draw_date']]);
        return count($result) > 0 ? true : false;

    }

    public function getGameDrawInfo(String $gameid, bool $flag) : stdClass { // get the last draw number for a game, returns object

        $sql1 = "SELECT * FROM gamestable_map WHERE game_type = :game_type";
        $drawStorage = (new Helper)->selectOne($sql1, ['game_type'=>$gameid])->draw_storage;
        $sql2 = "SELECT id as drawid, draw_date, draw_time, draw_number, draw_count, DATE(draw_datetime) as date_created FROM $drawStorage ORDER BY id DESC LIMIT 1";
        return (new Helper)->selectOne($sql2);

    }

    public function insertTestBetData(Array $json, String $betTable) {
        try {
            // Construct the SQL query
            $sql = "INSERT INTO $betTable (game_type, game_group, game_name, game_label, game_id, game_model, user_selection, selection_group, unit_stake, 
            multiplier, bet_amount, win_bonus, bet_odds, bet_number, bet_status, state, remarks, bet_code, bet_date, bet_period, bet_time, bettype, 
            stop_if_won, stop_if_lost, num_wins, token, uid, email, mobile, rebate, balance_before, balance_after, draw_number, draw_time, draw_period, new_period, ip_address) VALUES 
                    (:game_type, :game_group, :game_name, :game_label, :game_id, :game_model, :user_selection, :selection_group, 
                    :unit_stake, :multiplier, :bet_amount, :win_bonus, :bet_odds, :bet_number, :bet_status, :state, :remarks, 
                    :bet_code, :bet_date, :bet_period, :bet_time, :bettype, :stop_if_won, :stop_if_lost, :num_wins, :token, :uid, 
                    :email, :mobile, :rebate, :balance_before, :balance_after, :draw_number, :draw_time, :draw_period, :new_period,
                     :ip_address)";
    
            // Pass the values from the $json array as the second argument to the insert() method
            (new Helper)->insert($sql, test_data_small::getColumsArray($json));
            
        } catch (\Throwable $th) {
            ExceptionHandler::handleException($th);
        }
    }

}