<?php

namespace Bots;



use Discord\Discord;
use Discord\Parts\Guild\Guild;
use Discord\WebSockets\Intents;

class DiscordBot
{
    public $discord;
    public $arr_member;

    public function __construct($token)
    {
        $this->discord = new \Discord\Discord([
            'token' => $token,
            'loadAllMembers' => true,
            'intents' => [
                Intents::GUILD_VOICE_STATES, Intents::GUILD_MEMBERS,  Intents::GUILDS
            ],
            'pmChannels' => true,
        ]);
    }

    public function getOnlineUsers()
    {
//        $this->discord->on('ready', function (Discord $discord) {
//            $discord->guilds->fetch('385379150535458816')->done(function (Guild $guild) {
//                foreach ($guild->members as $member)
//                {
//                    $this->arr_member[] = $member;
//                }
//            $this->discord->close();
//            });
//        });
//        $this->discord->run();
//
//        return $this->arr_member;
        return "ok";

    }

    public function checkOnline()
    {
        //    $discord->joinVoiceChannel(510566162438815775);
//    $discord->on(Event::VOICE_STATE_UPDATE, function (VoiceStateUpdate $state, Discord $discord) {
//        echo $state->channel_id;
//    });

        //    $discord->joinVoiceChannel(510566162438815775);
//    $discord->on(Event::VOICE_STATE_UPDATE, function (VoiceStateUpdate $state, Discord $discord) {
//        echo $state->channel_id;
//    });
    }

}