<?php
use App\User;
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

        factory(User::class , 10)->create();
        // User::create([
        //     'name' => 'Alberto Guilherme',
        //     'email' => 'airosaguilherme@gmail.com',
        //     'password' => bcrypt('euler1998')
        // ]);
    }
}
