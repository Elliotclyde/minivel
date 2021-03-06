<?php

session_start();

// Set up env
$envKeyValPairs = explode(PHP_EOL,file_get_contents(__DIR__ . '/.env'));
foreach ($envKeyValPairs as $element){
    $keyValPair = explode('=',$element);
    $_ENV[$keyValPair[0]]=$keyValPair[1];
}

require __DIR__ . '/vendor/autoload.php';

include_once 'Bootstrap/Router/Request.php';
include_once 'Bootstrap/Router/Router.php';
include_once 'Bootstrap/View/View.php';
include_once 'Bootstrap/Model/Model.php';
include_once 'Bootstrap/Auth/Auth.php';

//set up main services

$request = new Request($_SERVER);
$router = new Router($request);
$requestVariables = $_REQUEST;
$auth = new Auth($_SESSION);