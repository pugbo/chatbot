<?php 

namespace App\Pugbo;

use Illuminate\Support\Facades\Log;

Class Pugbot
{

    public function handlePugbo($bot)
    {
        $bot->reply('Pugbo!');
        Log::debug('lol va?');
    }

    public function handleProssimoMeetup($bot)
    {
        $meetup = serialize($this->_getMeetup());
        $bot->reply('Ecco il prossimo meetup!');
        $bot->reply($meetup);
    }

    private function _getMeetup()
    {
        $key = env('MEETUP_API_KEY');
        Log::debug($key);
        $mc = new MeetupKeyAuthConnection($key);
        $me = new MeetupEvents($mc);
        $events = $me->getEvents(['group_urlname' => 'pugbo-bologna']);

        return $events;
    }

}