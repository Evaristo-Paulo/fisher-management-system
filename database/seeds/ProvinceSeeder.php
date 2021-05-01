<?php

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name' => 'Bengo',
         ]);
         Province::create([
            'name' => 'Benguela',
         ]);
         Province::create([
            'name' => 'Bie',
         ]);
         Province::create([
            'name' => 'Cabinda',
         ]);
         Province::create([
            'name' => 'Cunene',
         ]);
         Province::create([
            'name' => 'Huambo',
         ]);
         Province::create([
            'name' => 'Huíla',
         ]);
         Province::create([
            'name' => 'Cuando Cubango',
         ]);
         Province::create([
            'name' => 'Cuanza Norte',
         ]);
         Province::create([
            'name' => 'Cuanza Sul',
         ]);
         Province::create([
            'name' => 'Luanda',
         ]);
         Province::create([
            'name' => 'Lunda Norte',
         ]);
         Province::create([
            'name' => 'Lunda Sul',
         ]);
         Province::create([
            'name' => 'Malange',
         ]);
         Province::create([
            'name' => 'Moxico',
         ]);
         Province::create([
            'name' => 'Namibe',
         ]);
         Province::create([
            'name' => 'Uíge',
         ]);
         Province::create([
            'name' => 'Zaíre',
         ]);
    
    }
}
