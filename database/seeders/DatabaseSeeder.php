<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Domains\Event\Enums\Status;
use App\Domains\Event\Model\Event;
use App\Domains\User\Models\User;
use App\Domains\UserEvent\Enums\ParticipationStatus;
use Database\Factories\EventFactory;
=======
>>>>>>> 0e4811deb497ae1bcde168ded676a9e4b465aa63
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
        $this->assignEventsToUsers();
    }

    public function assignEventsToUsers()
    {
        Event::query()
            ->limit(50)
            ->get()
            ->each(function (Event $event) {
                $userIds = User::query()
                    ->inRandomOrder()
                    ->limit(rand(5, 25))
                    ->pluck('id')
                    ->all();

                $participationStatus = array_rand(ParticipationStatus::cases());
                $isParticipated = $event->status === Status::HELD->value
                    ? array_rand([true, false]) : false;

                $event->users()->attach($userIds, [
                    'participation_status' => $participationStatus,
                    'assigned_by' => EventFactory::getRandomAdminUserId(),
                    'is_participated' => $isParticipated,
                ]);
            });
    }
}
