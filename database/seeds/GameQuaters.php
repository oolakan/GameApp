<?php

use Illuminate\Database\Seeder;

class GameQuaters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('game_quaters')->insert(
            [
                [  'name'      =>  'Morning'],
                [  'name'      =>  'Afternoon'],
                [   'name'     =>  'Evening']
            ]);
    }
}
