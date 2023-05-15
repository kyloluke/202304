<?php

namespace Services\Lp3Cargo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Cargo\App\Models\CargoType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CargoTypeFactory extends Factory
{
    protected $model = CargoType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cargoTypes = ["コンテナ", "RoRO船", "在来船"];
        return [
            'name' => fake()->randomElement($cargoTypes),
        ];
    }
}
