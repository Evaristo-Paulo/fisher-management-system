<?php

use App\models\FishStates;
use Illuminate\Database\Seeder;

class FishStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FishStates::create([
            'state' => 'Fresco'
        ]);
        FishStates::create([
            'state' => 'Congelado'
        ]);
        FishStates::create([
            'state' => 'Outros'
        ]);
    }
}
