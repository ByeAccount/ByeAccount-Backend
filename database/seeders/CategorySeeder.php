<?php

namespace Database\Seeders;

use App\Enum\CategoryEnum;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (CategoryEnum::cases() as $categoryEnum) {
            Category::create([
                'name' => $categoryEnum->value,
            ]);
        }
    }
}
