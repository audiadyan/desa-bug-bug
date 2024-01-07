<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\Role;
use App\Models\Staf;
use App\Models\User;
use App\Models\About;
use App\Models\Event;
use App\Models\Social;
use App\Models\Dashboard;
use App\Models\Statistic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'super admin'
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'username' => 'audiadyan',
            'password' => bcrypt('audiadyan'),
            'name' => 'M. Audi Adyan',
            'role_id' => 1
        ]);

        // User::factory(5)->create();

        Dashboard::create()->social()->associate(Social::create())->save();

        // for ($i = 0; $i < 10; $i++) {
        //     Staf::factory()->for(Social::create())->create();
        // }

        // News::factory(20)->create();
        // Event::factory(10)->create();
    }
}
