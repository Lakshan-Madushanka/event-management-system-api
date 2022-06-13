<?php

namespace Database\Seeders;

use App\Domains\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(100)->create();

        User::updateOrCreate([
            'name' => 'Test Status',
            'email' => 'testadmin@mail.com',
            'password' => Hash::make('123Admin*'),
            'is_admin' => true,
        ]);

        User::updateOrCreate([
            'name' => 'Test Status',
            'email' => 'testuser@mail.com',
            'password' => '123User*',
        ]);
    }
}
