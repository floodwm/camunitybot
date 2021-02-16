<?php

namespace Bots;

use GuzzleHttp\Client;
use Bots\DiscordBot;
use Bots\Translate;

class TelegramBot
{
    public $apiUrl;
    private $chatID;
    public $url = 'https://api.telegram.org/';
    private $client;

    public function __construct($chatID, $token)
    {
        $this->apiUrl = $this->url . 'bot' . $token;
        $this->chatID = '89323786';
        $this->client = new Client();
    }

    public function sendMessage($text)
    {
        $params = [
            'chat_id' => $this->chatID,
            'text' => $text
        ];

        //$res = $client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params)

    }

    public function apiCommandResponse($command)
    {
        $remove_keyboard = json_encode([
            'remove_keyboard' => true,
        ]);

        $keyboard = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    [
                        'text' => 'Discord',
                    ],
                    [
                        'text' => 'Dota',
                    ],
                    [
                        'text' => 'Сбор!',
                    ]
                ],
            ]
        ]);

        $keyboardDiscord = json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'keyboard' => [
                [
                    [
                        'text' => 'Кто в дискорде',
                    ],
                ],
                [
                    [
                        'text' => 'Отслеживать вход новых участников!',
                    ]
                ],
            ]
        ]);

        switch ($command['message']['text'])
        {
            case 'го': case '/go@CamunityBot': case 'Сбор!':
                $params = ['chat_id' => $this->chatID, 'text' => $command['message']['from']['username'] . ' собирает тварей!'];
                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
            break;

            case '/bot@CamunityBot': case 'бот':
                $params = [
                    'chat_id' => $this->chatID,
                    'text' => 'Че хочешь тварь?',
                    'reply_markup' => $keyboard,
                ];

                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
                break;

            case '/roll@CamunityBot':
                $rand  = rand(1,100);
                $params = ['chat_id' => $this->chatID, 'text' => $command['message']['from']['username'] . '['.$command['message']['from']['first_name'] . '] выкинул: '. $rand];
                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
                break;

            case 'Discord':
                $params = [
                    'chat_id' => $this->chatID,
                    'text' => 'Что делать?',
                    'reply_markup' => $keyboardDiscord,
                ];
                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
                break;

            case 'Кто в дискорде':
                //$discord = new DiscordBot($_ENV['DISCORD_BOT_KEY']);
                //error_log("База данных Oracle недоступна!", 0);
                //$member = $discord->getOnlineUsers();
                $discord = new DiscordBot('ODA5NDg4NjQ3NjQzNDYzNzEy.YCV1DQ.Aw_SaZSD8H9LHwNM8zcjoyMYgwI');
                $par = $discord->getOnlineUsers();
                $params = [
                    'chat_id' => $this->chatID,
                    'text' => $par,
                    'reply_markup' => $remove_keyboard,
                ];
                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
                break;

            case 'Dota':
                $params = ['chat_id' => $this->chatID, 'text' => 'in next version'];
                $this->client->request('POST', $this->apiUrl . '/sendMessage', array('query' => $params));
                break;

            case '/translate':



            default:
                break;
        }
    }
}