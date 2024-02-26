<?php 
require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
class ExceptionHandler {
    public static function handleException(Throwable $th) : void {
        
        $errorInfo = [
            'status'  => 'error',
            'message' => $th->getMessage(),
            'line'    => $th->getLine(),
            'file'    => $th->getFile(),
            'trace'   => $th->getTrace()
        ];

        $fp = fopen('app/exceptions/log.txt', 'a');
        fwrite($fp, Utils::getDate(). ' => ' . json_encode($errorInfo) . PHP_EOL);
        fclose($fp);
    }

}
