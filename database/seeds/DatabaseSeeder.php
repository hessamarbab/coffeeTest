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
         $this->call(RoleSeeder::class);
         $this->call(OptionSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ChoiceSeeder::class);
         $this->call(UserSeeder::class);
    }
}
