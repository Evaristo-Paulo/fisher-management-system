<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'type' => 'Admin',
            'description' => 'Previlégio total do painel de controle'
         ]);
         Role::create([
            'type' => 'User',
            'description' => 'Previlégio reduzido do painel de controle'
         ]);
         Role::create([
            'type' => 'Manager',
            'description' => 'Previlégio parcial do sistema'
         ]);
    }
}
