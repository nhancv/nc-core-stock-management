<?php
header("Content-Type: application/json;charset=UTF-8");
header("Access-Control-Allow-Origin: http://localhost");
include_once dirname(__FILE__) . '/controller/function/IncludeFiles.php';
$response = array();
echo Controller::getInstance()->GeneratorUidL(2);
Controller::getInstance()->getUser($response);