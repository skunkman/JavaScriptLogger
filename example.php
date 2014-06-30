<?php
require_once('libraries/errorLogger.php');
require_once('libraries/javaScriptError.php');

$errorMessage = file_get_contents('php://input');
$jsError = new JavaScriptError($errorMessage);
$errorLogger = new ErrorLogger($jsError);
$errorLogger->write('test.log');
