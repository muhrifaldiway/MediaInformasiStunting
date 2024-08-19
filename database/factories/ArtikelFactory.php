<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Artikel::class;
    
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'isi' => $this->faker->text,
            'user_id' => User::factory(),
            'kategori' => Str::slug($this->faker->sentence),
        ];
    }
}
