<?php

use Bots\tgBot;

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$command = json_decode(file_get_contents('php://input'), true);

if ($command['message']['text'] == 'go') {
    $bot = new tgBot(getenv('TG_CHAT_ID'), getenv('TG_API_KEY'));
    //$bot->apiCommandResponse($command);
    $bot->apiSendMessage('ogo');
}else{
    exit();
}
