<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Category::create([
            'name' => 'Collection',
            'isActive' => 'active'
        ]);
         Category::create([
            'name' => 'Construction',
            'isActive' => 'active'
        ]);
         Category::create([
            'name' => 'Material',
            'isActive' => 'active'
        ]);
         Category::create([
            'name' => 'Design',
            'isActive' => 'active'
        ]);
         Category::create([
            'name' => 'Color Paletts',
            'isActive' => 'active'
        ]);
         Category::create([
            'name' => 'color',
            'isActive' => 'active'
        ]);
    }
}
