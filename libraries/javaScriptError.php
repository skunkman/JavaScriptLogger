<?php

require_once('../interfaces/errorInterface.php');

class JavaScriptError implements ErrorInterface
{
    private $json;

    public function __construct($jsonFromAJAX)
    {
        $this->json = $jsonFromAJAX;
    }

    public function getMessage()
    {
        return $this->parseJSON();
    }

    private function parseJSON()
    {
        $json = json_decode($this->json);
        return $json->error . ' in ' . $json->url . ' line ' . $json->line;
    }
}
