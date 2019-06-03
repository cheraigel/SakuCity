<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$shGBBPbWmozwGStr2mTA0OAJUpNu66EABG0h/0xt9ZK5hy.2qTJqq',
            'remember_token' => null,
            'created_at'     => '2019-05-31 09:44:36',
            'updated_at'     => '2019-05-31 09:44:36',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
