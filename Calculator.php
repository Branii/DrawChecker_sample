<?php 

class Calculator {

    // sing, dance, eat, sleep, walk
    public static function calculate(Int $a, Int $b, String $operation) : Int {
        if ($operation == 'add') {
            return $a + $b;
        } else if ($operation == 'subtract') {
            return $a - $b;
        } else if ($operation == 'multiply') {
            return $a * $b;
        } else if ($operation == 'divide') {
            return $a / $b;
        } else {
            return 0;
        }
    }
}
