<?php
/**
 * Saves the error message.
 *
 * Based on the error sent via dependency injection, this saves the error to the requested log.
 *
 * @author Robert Gump
 * @version 0.5.1
 */
class ErrorLogger
{
    private $error;

	/**
	 * @param Implementation of ErrorInterface.
	 */
    public function __construct(ErrorInterface $errorType)
    {
        $this->error = $errorType;
    }

	/**
	 * Writes to the given log file.
	 *
	 * @param $file is the specific log file for writing.
	 */
    public function write($file)
    {
        $fileToWrite = fopen($file, 'a');
        fwrite($fileToWrite, $this->buildErrorMessage());
        fclose($fileToWrite);
    }

	/**
	 * Builds the error message to write.
	 *
	 * @return The error message for the error log.
	 */
    private function buildErrorMessage()
    {
        $currentTimeStamp = date('Y-m-d H:i:s', time());
        return '[' . $currentTimeStamp . '] ' . $_SERVER['HTTP_USER_AGENT'] . ' - Client: ' .
            $_SERVER['REMOTE_ADDR'] . ' - ' . $this->error->getMessage() . "\n";
    }
}
