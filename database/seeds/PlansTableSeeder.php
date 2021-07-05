<?php
use App\Models\{
    Plan,
};
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Jedai',
            'url' => 'jedai',
            'price' => 5000,
            'description' => 'Um plano a sua medida',
        ]);
    }
}
