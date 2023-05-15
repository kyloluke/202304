<?php

namespace Services\Lp3Cargo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $carBrand = CarBrand::factory()->create();
        return [
            'name' => fake()->text(20),
            'name_en' => fake()->text(20),
            'car_brand_id' => $carBrand->id,
        ];
    }
}
