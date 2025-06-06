<?php

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
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            DeptSeeder::class,
            IntervalSeeder::class,
            GovernoratesSeeder::class,
            CustomerSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
