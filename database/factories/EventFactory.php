<?php

namespace Database\Factories;

use App\Domains\Event\Enums\Status;
use App\Domains\Event\Model\Event;
use App\Domains\Event\Services\EventService;
use App\Domains\User\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => 'code', // actual code set in event seeder class
            'name' => $this->faker->text(25),
            'is_online' => $this->faker->randomElement([true, false]),
            'venue' => function (array $attributes) {
                return ! $attributes['is_online'] ? $this->generateVenue() : null;
            },
            'link' => function (array $attributes) {
                return $attributes['is_online'] ? $this->faker->url() : null;
            },
            'start_time' => $this->generateStartTime(),
            'end_time' => function (array $attributes) {
                return Carbon::parse($attributes['start_time'])->addMinutes(rand(30, 120));
            },
            'status' => $this->faker->randomElement(Status::cases()),
            'is_private' => $this->faker->randomElement([true, false]),
            'time_zone' => $this->faker->timezone(),
            'description' => $this->faker->paragraphs(3, true),
            'created_by' => self::getRandomAdminUserId(),
            'event_in_charge' => self::getRandomAdminUserId(),
        ];
    }

    public static function getRandomAdminUserId(): int
    {
        return User::query()
            ->select('id')
            ->where('is_admin', true)
            ->inRandomOrder()
            ->first()
            ->id;
    }

    public function generateVenue(): array
    {
        $venue = ['no' => $this->faker->randomNumber()];

        for ($i = 1; $i <= rand(1, 5); $i++) {
            $venue['address_line'.$i] = $this->faker->text(25);
        }

        return $venue;
    }

    public function generateStartTime(): Carbon
    {
        $times = [now()->subHours(rand(1, 10)), now()->addHours(rand(1, 24)), now()->addDays(rand(1, 365))];

        return $times[rand(0, count($times) - 1)];
    }
}
