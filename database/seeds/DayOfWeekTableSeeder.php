<?php

use Illuminate\Database\Seeder;

class DayOfWeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('days')->insert(
            [
                [  'name'      =>  'Sunday'],
                [  'name'      =>  'Monday'],
                [   'name'     =>  'Tuesday'],
                [   'name'     =>  'Wednesday'],
                [   'name'     =>  'Thursday'],
                [   'name'     =>  'Friday'],
                [   'name'     =>  'Saturday'],
            ]);
    }
}