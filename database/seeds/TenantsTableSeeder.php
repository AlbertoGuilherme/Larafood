<?php

use App\Models\{
    Plan,
    Tenant
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = Plan::first();

            $plans->tenants()->create([
                    'NIF' => 530034000,
                    'name' => 'Olana',
                    'url' => 'olana',
                    'email' => 'olana@gmail.com'
            ]);
    }
}
