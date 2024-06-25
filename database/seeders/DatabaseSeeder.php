<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rachid AIT RHOUDANE',
            'email' => 'rachid@gmail.com',
            'password' => Hash::make('rachid123456789'),
            'role' => 'Owner'
        ]);

        User::factory(10)->unverified()->dontRemember()->state(new Sequence(
            fn ($sequence) => ['role' => collect(['Owner', 'User'])->random()],
        ))->create();

        Organisation::factory(20)->has(Contact::factory(3))->create();
    }
}
