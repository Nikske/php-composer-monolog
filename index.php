<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

// Logger
$log = new Logger('Logger');
$input = $_GET['message'];
switch($_GET['type']) {
    case 'DEBUG':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/info.log', Logger::DEBUG));
        $log->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
        $log->debug($input);
        break;
    case 'INFO':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/info.log', Logger::INFO));
        $log->pushHandler(new BrowserConsoleHandler(Logger::INFO));
        $log->info($input);
        break;
    case 'NOTICE':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/info.log', Logger::NOTICE));
        $log->pushHandler(new BrowserConsoleHandler(Logger::NOTICE));
        $log->notice($input);
        break;
    case 'WARNING':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/warning.log', Logger::WARNING));
        $log->warning($input);
        break;
    case 'ERROR':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/warning.log', Logger::ERROR));
        $log->error($input);
        break;
    case 'CRITICAL':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/warning.log', Logger::CRITICAL));
        $log->critical($input);
        break;
    case 'ALERT':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/warning.log', Logger::ALERT));
        $log->alert($input);
        break;
    case 'EMERGENCY':
        $log->pushHandler(new StreamHandler(__DIR__.'/logs/emergency.log', Logger::EMERGENCY));
        $log->emergency($input);
        break;
}



require 'buttons.html';