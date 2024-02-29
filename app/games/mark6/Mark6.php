<?php 
class Mark6  { 

  public static function ExtraNo(Array $selection, Array $drawNumber) : Bool {
    $lastValue  =  end($drawNumber);
    return (in_array($lastValue,$selection[0]) ? "1" : "0");
  } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,7]) = true

  public static function ExtraHeadTail(Array $selection, Array $drawNumber) : Bool { //more than 1   
    $lastValue    =  str_split(end($drawNumber));  
    $selectedhead =  $selection[0];
    $selectedtail =  $selection[1];
    $winCount = 0;
    if (in_array($lastValue[0], $selectedhead)) {
        $winCount++;
    }
    if (in_array($lastValue[1], $selectedtail)) {
        $winCount++;
    }
    
    return ($winCount >=1) ? "1" : "0";
  } //-> fn([1,2,3,4,5,6,7,8,9,10],[1,2,3,4,5,6,2]) = true

  public static function ComboZodiac(Array $selection, Array $drawNumber) : Bool { ##-> review this method urgeent
   
       if (end($drawNumber) == 49) {
          return 6;
       }
      $count = 0;
      foreach ($selection[0] as $selected_zodiac) {
        if (in_array(end($drawNumber) ,  self::$zodiacsigns[$selected_zodiac])) {
          $count++;
        }
      }
      return ($count >= 1) ? "1" : "0";
     
  }

  public static function SpecialZodiac(Array $selection, Array $drawNumber) : Bool {

        if (end($drawNumber) == 49) {
          return 6;
      }
      $count = 0;
      foreach ($selection[0] as $selected_zodiac) {
        if (in_array(end($drawNumber) ,  self::$zodiacsigns[$selected_zodiac])) {
          $count++;
        }
      }
      return ($count >= 1) ? "1" : "0";
  }




  //####################### Helper Functions ############################
  public static function generateMapping($start) {
    $sequence = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    $mapping = [];
    $length = count($sequence);
    $distance = 0;
    $index = $start;
  
    for ($i = 0; $i <= $length; $i++) {
        $mapping[$sequence[$index]] = $distance;
        $distance++;
        $index = $index === 0 ? $length - 1 : $index - 1;
    }
  
    return $mapping;
  }
  
  public static function generateArray($position,$current_chinese_zodiac = 5) {
    
    $sequenceMappingData = self::generateMapping($current_chinese_zodiac);
    $finalResults = [];
    $maxArrayLoop = $sequenceMappingData[$position] === 1 ? 5 : 4;
  
    for ($i = 1; $i <= $maxArrayLoop; $i++) {
        $number = 12 * $i - (12 - $sequenceMappingData[$position]);
        $formattedNumber = $number < 10 ? "$number" : "$number";
        $finalResults[] = $formattedNumber;
    }
  
    return $finalResults;
  }

  private static $zodiacsigns = [
    "Rat" => [5, 17, 29, 41],
    "Ox" => [4, 16, 28, 40],
    "Tiger" => [3, 15, 27, 39],
    "Rabbit" => [2, 14, 26, 38],
    "Dragon" => [1, 13, 25, 37, 49],
    "Snake" => [12, 24, 36, 48],
    "Horse" => [11, 23, 35, 47],
    "Goat" => [10, 22, 34, 46],
    "Monkey" => [9, 21, 33, 45],
    "Rooster" => [8, 20, 32, 44],
    "Dog" => [7, 19, 31, 43],
    "Pig" => [6, 18, 30, 42]
  ];
  //####################### Helper Functions ############################
  

}

var_dump((Mark6::ComboZodiac([["Rat","Ox","Dragon","Goat"]],[1,2,3,4,5,6,17]))); // true