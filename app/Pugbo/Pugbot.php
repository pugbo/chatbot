<?php 

namespace App\Pugbo;

use Illuminate\Support\Facades\Log;
use DMS\Service\Meetup\MeetupKeyAuthClient;

Class Pugbot
{

    public function handlePugbo($bot)
    {
        $bot->reply('è il PHP User Group di Bologna!');
        Log::debug('lol va?');
    }

    public function handleProssimoMeetup($bot)
    {
        $meetup = $this->_getMeetup();
        $bot->reply('Ecco il prossimo meetup!');
        $bot->reply(sprintf(
            '%s, sono rimasti %s posti!',
            $meetup['name'],
            $meetup['rsvp_limit'] - $meetup['yes_rsvp_count'],
        ));
        $bot->reply($meetup['link']);
    }

    private function _getMeetup()
    {
        $out = 'vuoto';
        $key = env('PUGBO_MEETUP_KEY');
        $mc = MeetupKeyAuthClient::factory([
            'key' => $key,
        ]);
        $events = $mc->getGroupEvents(['urlname' => 'pugbo-grusp']);

        Log::debug($events[0]);

        return $events[0];
    }

}