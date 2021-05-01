<?php

use App\Models\Month;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Month::create([
            'name' => 'Janeiro'
        ]);
        Month::create([
            'name' => 'Fevereiro'
        ]);
        Month::create([
            'name' => 'Março'
        ]);
        Month::create([
            'name' => 'Abril'
        ]);
        Month::create([
            'name' => 'Maio'
        ]);
        Month::create([
            'name' => 'Junho'
        ]);
        Month::create([
            'name' => 'Julho'
        ]);
        Month::create([
            'name' => 'Agosto'
        ]);
        Month::create([
            'name' => 'Setembro'
        ]);
        Month::create([
            'name' => 'Outubro'
        ]);
        Month::create([
            'name' => 'Novembro'
        ]);
        Month::create([
            'name' => 'Dezembro'
        ]);

    }
}
