<?php 
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT']. 'vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
use PHPUnit\Framework\TestCase;

final class Tests extends TestCase{
    public function testgetPendingBetSlip(): void {
        $this->assertEquals(
            1,
            (new Model)->getPendingBetSlip("betTable", "betPeriod", 1000, 0)
        );
    }
  
}

function checkResult($selection, $drawNumber) {
    // Convert selection and draw number to arrays for comparison
    $selectionArray = str_split($selection);
    $drawNumberArray = str_split($drawNumber);

    // Count matching numbers
    $matchingNumbers = count(array_intersect($selectionArray, $drawNumberArray));

    // Use ternary operator to determine the state
    $state = ($matchingNumbers > 0) ? (($matchingNumbers == count($selectionArray)) ? 1 : 3) : 2;

    return $state;
}

// Example usage:
$selection = "12345";
$drawNumber = "12678";
$result = checkResult($selection, $drawNumber);
echo $result; // Output: 2 (lost)


