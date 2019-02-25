<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('pugbo', 'App\Pugbo\Pugbot@handlePugbo');
$botman->hears('prossimo meetup', 'App\Pugbo\Pugbot@handleProssimoMeetup');