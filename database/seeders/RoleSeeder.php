<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['A', 'C', 'S'] as $roles) {
            Role::factory()->create([
                'role_name' => $roles,
            ]);
        }
    }
}
