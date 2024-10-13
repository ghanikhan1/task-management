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
    public function run()
    {
        // Create some sample categories
        Category::create(['name' => 'Work']);
        Category::create(['name' => 'Personal']);
        Category::create(['name' => 'Urgent']);
    }
}
