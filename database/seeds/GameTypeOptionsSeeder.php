<?php

use Illuminate\Database\Seeder;

class GameTypeOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('game_type_options')->insert(
            [
                [  'name'      =>  'PERM 2'],
                [  'name'      =>  'PERM 3'],
                [  'name'      =>  'PERM 4'],
                [  'name'      =>  'PERM 5'],

                [  'name'      =>  '1 AGAINST'],
                [  'name'      =>  '2 AGAINST'],
                [  'name'      =>  '3 AGAINST'],
                [  'name'      =>  '4 AGAINST'],
                [  'name'      =>  '5 AGAINST'],

                [   'name'     =>  '2 DIRECT'],
                [   'name'     =>  '3 DIRECT'],
                [   'name'     =>  '4 DIRECT'],
                [   'name'     =>  '5 DIRECT'],
            ]);
    }
}
