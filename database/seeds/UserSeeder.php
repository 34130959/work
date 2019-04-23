<?php

use Illuminate\Database\Seeder;

//引入模型
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空数据表
        User::truncate();

        $data = [
            'username' => 'admin',
            'nikename' => '卢本伟',
            'password' => bcrypt('admin'),
            'email' => 'lu@gmail.com',
            'phone' => '1314187'
        ];

        User::create($data);

        //调用数据工厂
        factory(App\Models\User::class,99)->create();
    }
}
