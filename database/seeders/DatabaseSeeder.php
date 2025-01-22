<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);

        if (App::environment('local')) {
            $adminRole = Role::firstWhere('name', RoleEnum::ADMIN->value);

            User::factory()
                ->create([
                    'pseudo' => 'sebastienwuidar',
                    'email' => 'contact@sebastienwuidar.com',
                    'password' => Hash::make('password'),
                ])
                ->assignRole($adminRole);
        }
    }
}
