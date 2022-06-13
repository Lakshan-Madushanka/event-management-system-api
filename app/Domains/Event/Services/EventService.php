<?php

namespace App\Domains\Event\Services;

use App\Domains\Event\Model\Event;

class EventService
{
    public static function generateEventCode(): string
    {
        $lastInsertedEvent = Event::query()
            ->orderByDesc('id')
            ->first(['id']);

        $eventCodeId = $lastInsertedEvent ? $lastInsertedEvent->id + 1 : 1;

        return 'Event_#'.$eventCodeId;
    }
}
