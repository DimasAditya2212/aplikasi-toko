<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();
        Category::create([
            'name' => 'Rokok',
            'slug' => 'rokok'
        ]);

        Category::create([
            'name' => 'Kebutuhan Rumah Tangga',
            'slug' => 'kebutuhan-rumah-tangga'
        ]);
    }
}
