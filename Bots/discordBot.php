<?php

namespace Bots;

use Discord\Discord;


class discordBot
{
    private $discord;

    public function __construct($token)
    {
        $this->discord = new Discord([
            'token' => $token,
        ]);
    }

    public function getOnlineUsers()
    {
        $this->discord->run();
    }

}