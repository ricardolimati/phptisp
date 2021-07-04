<?php

use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Formatter\LineFormatter;

require __DIR__ . "/vendor/autoload.php";

$logger = new Logger("web");

$logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
$logger->pushHandler(new StreamHandler(__DIR__."/log.txt", Logger::WARNING));
$logger->pushProcessor(function ($record){
   $record["extra"]["HTTP_HOST"] = $_SERVER["HTTP_HOST"];
   $record["extra"]["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
   $record["extra"]["REQUEST_METHOD"] = $_SERVER["REQUEST_METHOD"];
   $record["extra"]["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];

   return $record;
});

$tele_key = "1755759066:AAH_W5Hp4PC-75TPcmXoztnf7oNRW2EgfCA";
$tele_channel = "@MonologPHPTip";
$tele_handle = new TelegramBotHandler(
    $tele_key,
    $tele_channel,
    Logger::DEBUG
);
$tele_handle->setFormatter(new LineFormatter("%level_name%: %message%"));

$logger->pushHandler($tele_handle);

$logger->debug("Olá Mundo", ["Logger"=>true]);
$logger->info("Olá Mundo", ["Logger"=>true]);
$logger->notice("Olá Mundo", ["Logger"=>true]);

$logger->warning("Olá Mundo", ["Logger"=>true]);
$logger->error("Olá Mundo", ["Logger"=>true]);


$logger->critical("Olá Mundo", ["Logger"=>true]);
$logger->alert("Olá Mundo", ["Logger"=>true]);

$logger->emergency("Esta mensagem foi envia pelo Monolog!", ["Logger"=>true]);
$logger->alert("Olá Mundo", ["Logger"=>true]);
