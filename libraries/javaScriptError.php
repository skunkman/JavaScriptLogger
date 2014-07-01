<?php
require_once('interfaces/errorInterface.php');

/**
 * Implementation of the JavaScript error logging.
 *
 * Parses the JSON sent through the constructor when getMessage method is called.
 *
 * @author Robert Gump
 * @version 0.5.1
 */
class JavaScriptError implements ErrorInterface
{
    private $json;

    public function __construct($jsonFromAJAX)
    {
        $this->json = $jsonFromAJAX;
    }

	/**
	 * @return Message from the parseJSON method.
	 */
    public function getMessage()
    {
        return $this->parseJSON();
    }

	/**
	 * @return Error message that is parsed from JSON.
	 */
    private function parseJSON()
    {
        $json = json_decode($this->json);
        return $json->error . ' in ' . $json->url . ' line ' . $json->line;
    }
}
