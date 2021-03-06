<?php

use App\Models\User;
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
        factory(User::class, 1)->create([
            'name' => 'yorozco',
            'email' => 'yorozco@cnti.gob.ve',
            'role' => 'ADMIN'
        ]);

        factory(User::class, 1)->create([
            'name' => 'wizardx',
            'email' => 'wizardx1407@gmail.com',
            'role' => 'ADMIN'
        ]);

        factory(User::class, 50)->create();
    }
}
