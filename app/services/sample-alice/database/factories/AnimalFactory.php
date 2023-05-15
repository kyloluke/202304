<?php

namespace Services\SampleAlice\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\SampleAlice\App\Models\Animal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
