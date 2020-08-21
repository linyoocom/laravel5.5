<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用DB方式
        /*DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/

        //使用模型工厂
        /*factory(App\Model\Role::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());   //模型关联插入
        });*/

        factory(App\Model\Role::class, 5)->create();
        //执行命令 php artisan db:seed --class=RolesSeeder
    }
}
