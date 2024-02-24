<?php 

class GameIdMap {

    // 1.0 minute game ids
    public static function get1x0(): array {
        return [25]; //testing
        //return [1,3,4,6,7,10,13,25,27];
    }

    // 1.5 minute game ids
    public static function get1x5(): array {
        return [9,11,14,17];
    }

    // 3 minute game ids
    public static function get3x0(): array {
        return [8,12,15,16,23];
    }

    // 5 minute game ids
    public static function get5x0(): array {
        return [5,26,28];
    }
}