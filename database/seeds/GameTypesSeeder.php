<?php

use Illuminate\Database\Seeder;

class GameTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('game_types')->insert(
            [
                [  'name'      =>  'PERM'],
                [  'name'      =>  'AGAINST'],
                [   'name'     =>  'DIRECT'],
            ]);
    }
}
