<?php

use App\GameQuater;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DayOfWeekTableSeeder::class);
        $this->call(GameQuaters::class);
        $this->call(GameNamesSeeder::class);
        $this->call(GameTypesSeeder::class);
        $this->call(GameTypeOptionsSeeder::class);
    }
}