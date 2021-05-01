<?php

use App\Models\FisherType;
use Illuminate\Database\Seeder;

class FisherManTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FisherType::create([
            'type' => 'Colectivo'
        ]);
        FisherType::create([
            'type' => 'Singular'
        ]);
    }
}
