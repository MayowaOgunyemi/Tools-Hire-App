<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Power Tools',
            'slug' => 'power-tools',
            'description' => 'Tools powered by electricity or other means, rather than by manual labor.',
        ]);

        Category::create([
            'name' => 'Hand Tools',
            'slug' => 'hand-tools',
            'description' => 'Tools powered by manual labor.',
        ]);

        // Create more categories
        Category::create([
            'name' => 'Safety Equipment',
            'slug' => 'safety-equipment',
            'description' => 'Protective gear to ensure the safety of workers.',
        ]);
    }
}
