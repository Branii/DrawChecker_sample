<?php 
class test_data_small{  // this is a test class

  public function loadTestData () : array { // testing only

    $data = '[
       {
      "game_type": 18,
      "game_group": "ExtraNo",
      "game_name": 94,
      "game_label": "game_label 97",
      "game_id": 25,
      "game_model": 40,
      "user_selection": "extraNumber",
      "selection_group": "'.serialize([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]).'", 
      "unit_stake": "unit_stake 97",
      "multiplier": "multiplier 97",
      "bet_amount": "bet_amount 97",
      "win_bonus": "win_bonus 97",
      "bet_odds": "bet_odds 97",
      "bet_number": "bet_number 97",
      "bet_status": "pending",
      "state": "state 97",
      "remarks": "remarks 97",
      "bet_code": "bet_code 97",
      "bet_date": "bet_date 97",
      "bet_period": "bet_period 97",
      "bet_time": "bet_time 97",
      "bettype": "bettype 97",
      "stop_if_won": 22,
      "stop_if_lost": 39,
      "num_wins": "num_wins 97",
      "token": "token 97",
      "uid": 34,
      "email": "email 97",
      "mobile": 70,
      "rebate": "rebate 97",
      "balance_before": "balance_before 97",
      "balance_after": "balance_after 97",
      "draw_number": "pending",
      "draw_time": "draw_time 97",
      "draw_period": "202402070067",
      "new_period": "202402070068",
      "ip_address": "ip_address 97"
    }
  ]';

  return json_decode($data, true);
    
  }

  public static function getColumsArray( array $json) : array { // testing only
    return [
      'game_type'=>$json['game_type'],
      'game_group'=>$json['game_group'],
      'game_name'=>$json['game_name'],
      'game_label'=>$json['game_label'],
      'game_id'=>$json['game_id'],
      'game_model'=>$json['game_model'],
      'user_selection'=>$json['user_selection'],
      'selection_group'=>$json['selection_group'],
      'unit_stake'=>$json['unit_stake'],
      'multiplier'=>$json['multiplier'],
      'bet_amount'=>$json['bet_amount'],
      'win_bonus'=>$json['win_bonus'],
      'bet_odds'=>$json['bet_odds'],
      'bet_number'=>$json['bet_number'],
      'bet_status'=>$json['bet_status'],
      'state'=>$json['state'],
      'remarks'=>$json['remarks'],
      'bet_code'=>$json['bet_code'],
      'bet_date'=>$json['bet_date'],
      'bet_period'=>$json['bet_period'],
      'bet_time'=>$json['bet_time'],
      'bettype'=>$json['bettype'],
      'stop_if_won'=>$json['stop_if_won'],
      'stop_if_lost'=>$json['stop_if_lost'],
      'num_wins'=>$json['num_wins'],
      'token'=>$json['token'],
      'uid'=>$json['uid'],
      'email'=>$json['email'],
      'mobile'=>$json['mobile'],
      'rebate'=>$json['rebate'],
      'balance_before'=>$json['balance_before'],
      'balance_after'=>$json['balance_after'],
      'draw_number'=>$json['draw_number'],
      'draw_time'=>$json['draw_time'],
      'draw_period'=>$json['draw_period'],
      'new_period'=>$json['new_period'],
      'ip_address'=>$json['ip_address']
  ];
  }
}

