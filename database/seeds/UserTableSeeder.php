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
                    'delete_status' => 0,
                    'api_token' => '98234943jkdsahda8sydbhakgyluhisbdhygukaalsdkbasdkhkhb',
                    'roles_id'  =>  1
                ]
        ]);
    }
}