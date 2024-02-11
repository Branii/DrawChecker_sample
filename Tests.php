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

