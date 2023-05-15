<?php

namespace Services\Lp3Ship\Database\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Models\Ship;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Ship>
 */
class ShipFactory extends Factory
{
    protected $model = Ship::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake();
        return [
            'name' => $faker->name(),
            'type' => $faker->randomElement(array_column(ShipType::cases(), "value")),
        ];
    }
}
