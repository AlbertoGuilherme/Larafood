<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name' => 'gui airosa',
            'email' => "gui@gmail.com",
            'password' => bcrypt('123')

        ]);
    }
}
