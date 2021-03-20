<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use App\Models\User as User;
use App\Models\Position as Position;

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
            'id'  => '1',
            'name'  => 'Administrator',
            'email'  => 'admin@admin.com',
            'password'  => bcrypt('admin')
        ]);

        Artisan::call('passport:client --name=Administrator --no-interaction --personal');

        Position::create([
            'user_id'  => '1',
            'status'  => 'active',
            'position'  => 'admin'
        ]);
    }
}
