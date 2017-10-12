<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert(
            [
                [   'name'      =>  'Opeoluwa Joseph',
                    'email'     =>  'opeoluwajoe@yahoo.com',
                    'password'  =>  bcrypt('success'),
                    'phone'     =>  '08179980370',
                    'approval_status' => 'APPROVED',
                    'api_token' => '98234943jkdsahda8sydbhakgyluhisbdhygukaalsdkbasdkhkhb',
                    'roles_id'  =>  1
                ],
                [
                'name'      =>  'Opeoluwa Joseph',
                'email'     =>  'oolakan@yahoo.com',
                'password'  =>  bcrypt('success'),
                'phone'     =>  '08179980370',
                'approval_status' => 'APPROVED',
                'api_token' => 'kjauiduadsadsadnmadsuidasd889834783498393798',
                'roles_id'  =>  2 ],

            [   'name'      =>  'Opeoluwa Joseph',
                'email'     =>  'opeoluwa@yahoo.com',
                'password'  =>  bcrypt('success'),
                'phone'     =>  '08179980370',
                'approval_status' => 'APPROVED',
                'api_token' => '98234943jkdsahda8sydbhakgyluhisbdhygukaluhidjkhu',
                'roles_id'  =>  3
            ]
        ]);
    }
}
