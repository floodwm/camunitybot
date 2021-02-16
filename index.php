<?php

require_once __DIR__.'/vendor/autoload.php';

use Bots\TelegramBot;
use Dotenv\Dotenv;

$data = json_decode(file_get_contents('php://input'), TRUE);

$env = Dotenv::createImmutable(__DIR__);
$env->load();

$bot = new TelegramBot($_ENV['TG_CHAT_ID'], $_ENV['TG_API_KEY']);
//$bot->sendMessage('opa');
$bot->apiCommandResponse($data);
maksim loh 