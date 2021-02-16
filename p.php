<?php

include __DIR__.'/vendor/autoload.php';
//510566162438815775
use Discord\Discord;
use Discord\Parts\Guild\Guild;
use Discord\WebSockets\Intents;

$discord = new Discord([
    'token' => 'ODA5NDg4NjQ3NjQzNDYzNzEy.YCV1DQ.Aw_SaZSD8H9LHwNM8zcjoyMYgwI',
    'loadAllMembers' => true,
    'intents' => [
        Intents::GUILD_VOICE_STATES, Intents::GUILD_MEMBERS,  Intents::GUILDS
    ],
    'pmChannels' => true,
]);

//$discord->guilds->freshen()->done(function (GuildRepository $guilds) {
//    var_dump($guilds);
//});

$discord->on('ready', function (Discord $discord) {


//    $discord->on(Event::GUILD_UPDATE, function (Guild $new, Discord $discord, Guild $old) {
//        // ...
//    });
//
// //   var_dump($discord->users);
//
//    foreach ($discord->users as $user){
//        var_dump($user['username']);
//    }
//    $discord->close();
//    $ch = $discord->getChannel('510566162438815775');
//    var_dump($ch);

    $discord->guilds->fetch('385379150535458816')->done(function (Guild $guild) {


//        foreach ($guild->channels as $channel){
//            var_dump($channel);
//        }
        foreach ($guild->members as $member)
        {
            var_dump($member);
        }

    });
});


//    $discord->joinVoiceChannel(510566162438815775);
//    $discord->on(Event::VOICE_STATE_UPDATE, function (VoiceStateUpdate $state, Discord $discord) {
//        echo $state->channel_id;
//    });

$discord->run();
