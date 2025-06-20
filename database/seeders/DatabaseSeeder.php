<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ✅ Crear roles por defecto
        Role::insert([
            ['name' => 'superadmin'],
            ['name' => 'notario'],
            ['name' => 'ayudante'],
        ]);

        // ✅ Crear usuarios por cada rol
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@notaria.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // superadmin
        ]);

        User::create([
            'name' => 'Notario Principal',
            'email' => 'notario@notaria.com',
            'password' => Hash::make('notario123'),
            'role_id' => 2, // notario
        ]);

        User::create([
            'name' => 'Ayudante Legal',
            'email' => 'ayudante@notaria.com',
            'password' => Hash::make('ayudante123'),
            'role_id' => 3, // ayudante
        ]);
    }
}
