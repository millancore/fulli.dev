<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'PHP', 'Laravel', 'Web Development', 'Backend', 'Frontend', 'Database', 'DevOps'
        ];
        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
