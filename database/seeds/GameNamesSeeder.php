<?php

use Illuminate\Database\Seeder;

class GameNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('game_names')->insert(
            [
                [  'name'           =>  'VAN',
                    'days_id'       => 1,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'DON KING',
                    'days_id'       =>  1,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'HOUSE MASTER',
                    'days_id'       =>  1,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],

                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  1,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],


                [  'name'           =>  'AKWA IBOM',
                    'days_id'       =>  2,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'INSTANTA',
                    'days_id'           =>  2,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'MONDAY SPECIAL',
                    'days_id'           =>  2,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  2,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],


                [  'name'           =>  'BIGGY',
                    'days_id'           =>  3,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'LAG 77',
                    'days_id'           =>  3,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'LUCKY G',
                    'days_id'           =>  3,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  3,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],


                [  'name'           =>  'AROYAL VAG',
                    'days_id'           =>  4,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'ARENA',
                    'days_id'           =>  4,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'MID WEEK',
                    'days_id'           =>  4,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  4,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],


                [  'name'           =>  'ROYAL A1',
                    'days_id'           =>  5,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'VISA',
                    'days_id'           =>  5,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'FORTUNE',
                    'days_id'           =>  5,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  4,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],

                [  'name'           =>  'TOTA',
                    'days_id'           =>  6,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'ROYAL 06',
                    'days_id'           =>  6,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'BONANZA',
                    'days_id'           =>  6,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  6,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],


                [  'name'           =>  'QUEENS',
                    'days_id'           =>  7,
                    'game_quaters_id' => 1,
                    'start_time'    =>  '06:00',
                    'stop_time'     =>  '10:00',
                    'draw_time'     =>  '10:00'
                ],
                [  'name'           =>  'KINGS',
                    'days_id'           =>  7,
                    'game_quaters_id' => 2,
                    'start_time'    =>  '10:00',
                    'stop_time'     =>  '14:00',
                    'draw_time'     =>  '14:00'
                ],
                [  'name'           =>  'NATIONAL',
                    'days_id'           =>  7,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],
                [  'name'           =>  'HOLIDAY SPECIAL',
                    'days_id'       =>  7,
                    'game_quaters_id' => 3,
                    'start_time'    =>  '14:00',
                    'stop_time'     =>  '19:30',
                    'draw_time'     =>  '19:30'
                ],

            ]);
    }
}
