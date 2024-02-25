<?php 

class GameTableMap {

    public static function getGameTableMap(): array { // all geme tables

        $json = '{
            "1": {
                "draw_table": "draw_numbers",
                "bet_table": "bet"
            },
            "3": {
                "draw_table": "dt_royal10",
                "bet_table": " bt_royal10"
            },
            "4": {
                "draw_table": "dt_1kb5d1m",
                "bet_table": "bt_1kb5d1m"
            },
            "5": {
                "draw_table": "dt_luckypick5",
                "bet_table": "bt_luckypick5"
            },
            "6": {
                "draw_table": "dt_1kball1min",
                "bet_table": "bt_1kball1min"
            },
            "7": {
                "draw_table": "dt_speedy1min",
                "bet_table": "bt_speedy1min"
            },
            "8": {
                "draw_table": "dt_speedy5d3min",
                "bet_table": "bt_speedy5d3min"
            },
            "9": {
                "draw_table": "dt_Lucky5D15mins",
                "bet_table": "bt_Lucky5D15mins"
            },
            "10": {
                "draw_table": "dt_Fast31min",
                "bet_table": "bt_Fast31min"
            },
            "11": {
                "draw_table": "dt_SpeedyFast315mins",
                "bet_table": "bt_SpeedyFast315mins"
            },
            "12": {
                "draw_table": "dt_LuckyFast33mins",
                "bet_table": "bt_LuckyFast33mins"
            },
            "13": {
                "draw_table": "dt_1kballPc281mins",
                "bet_table": "bt_1kballPc281mins"
            },
            "14": {
                "draw_table": "dt_SpeedyPc2815mins",
                "bet_table": "bt_SpeedyPc2815mins"
            },
            "15": {
                "draw_table": "dt_Luckypc283mins",
                "bet_table": "bt_Luckypc283mins"
            },
            "16": {
                "draw_table": "dt_Lucky3D",
                "bet_table": "bt_Lucky3D"
            },
            "17": {
                "draw_table": "dt_SpeedyPK1015min",
                "bet_table": "bt_SpeedyPK1015min"
            },
            "23": {
                "draw_table": " dt_LuckyPK103m",
                "bet_table": "bt_LuckyPK103m"
            },
            "25": {
                "draw_table": "dt_rapidmark6",
                "bet_table": "bt_rapidmark6"
            },
            "26": {
                "draw_table": "dt_mark65min",
                "bet_table": "bt_mark65min"
            },
            "27": {
                "draw_table": "dt_rapid11x5",
                "bet_table": "bt_rapid11x5"
            },
            "28": {
                "draw_table": "dt_lucky11x55min",
                "bet_table": "bt_lucky11x55min"
            },
            "29": {
                "draw_table": "dt_rapidhappy8",
                "bet_table": "bt_rapidhappy8"
            }
        }';
        
        return json_decode($json, true);
    }
}

