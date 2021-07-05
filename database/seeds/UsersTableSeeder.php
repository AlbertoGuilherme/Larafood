<?php
use App\Models\{
    Tenant,
};
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::first();

        $tenants->users()->create([
            'name' => 'eli',
            'email' => "eli@gmail.com",
            'password' => bcrypt('123')

        ]);
    }
}
