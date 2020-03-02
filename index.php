<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('test');
$log->pushHandler(new StreamHandler(__DIR__.'/logs/warning.log', Logger::DEBUG));

// add records to the log
$log->info($_GET['message']);

require 'buttons.html';