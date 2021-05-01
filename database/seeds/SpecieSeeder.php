<?php

use App\Models\Specie;
use Illuminate\Database\Seeder;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specie::create([
            'name' => 'Crustáceo',
        ]);
        Specie::create([
            'name' => 'Demersal',
        ]);
        Specie::create([
            'name' => 'Molusco',
        ]);
        Specie::create([
            'name' => 'Pelágico',
        ]);
    }
}
