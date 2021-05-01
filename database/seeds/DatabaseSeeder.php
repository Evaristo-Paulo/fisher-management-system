<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FisherManTypeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(MunicipeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(FishStateSeeder::class);
        $this->call(SpecieSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(MonthSeeder::class);
    }
}
