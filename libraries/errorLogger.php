<?php

class ErrorLogger
{
    private $error;

    public function __construct(ErrorInterface $errorType)
    {
        $this->error = $errorType->getMessage();
    }

    public function write($file)
    {
        $fileToWrite = fopen($file, 'a');
        fwrite($fileToWrite, $this->buildErrorMessage());
        fclose($fileToWrite);
    }

    private function buildErrorMessage()
    {
        $currentTimeStamp = date('Y-m-d H:i:s', time());
        return $currentTimeStamp . ' - ' . $_SERVER['HTTP_USER_AGENT'] . ' - Client: ' .
            $_SERVER['REMOTE_ADDR'] . ' - ' . $this->error . "\n";
    }
}
