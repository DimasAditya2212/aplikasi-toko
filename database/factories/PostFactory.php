<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_produk' => mt_rand(100, 1000),
            'nama_produk' => $this->faker->name(),
            'harga_beli' => mt_rand(1000, 5000),
            'harga_jual' => mt_rand(7000,  10000),
            'total_stok' => mt_rand(100, 1000),
            'category_id' => mt_rand(1, 2)
        ];
    }
}
