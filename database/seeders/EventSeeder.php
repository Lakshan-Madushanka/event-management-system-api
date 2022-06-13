<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Domains\Event\Model\Event;
use App\Domains\Event\Services\EventService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 0e4811deb497ae1bcde168ded676a9e4b465aa63
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->count(150)
            ->create()
            ->each(function (Event $event) {
                $event->code = 'Event_#'.$event->id;
                $event->save();
            });
    }
}
