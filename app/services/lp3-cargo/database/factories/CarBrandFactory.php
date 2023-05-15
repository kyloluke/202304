<?php

namespace Services\Lp3Cargo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarBrandFactory extends Factory
{
    protected $model = CarBrand::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(20),
            'name_en' => fake()->text(20),
        ];
    }
}
