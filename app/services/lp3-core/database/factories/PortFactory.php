<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Core\App\Models\Port;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PortFactory extends Factory
{
    protected $model = Port::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'name_en' => fake()->company(),
            'zip_code' => fake()->postcode(),
            'state_jp' => fake()->name(),
            'state_en' => fake()->name(),
            'city_jp' => fake()->city(),
            'city_en' => fake()->city(),
            'address1_jp' => fake()->address(),
            'address2_jp' => fake()->address(),
            'address3_jp' => fake()->address(),
            'address1_en' => fake()->address(),
            'address2_en' => fake()->address(),
            'address3_en' => fake()->address(),
            'timezone' => fake()->timezone(),
            'naccs_code' => fake()->text(5),
            'unlo_code' => fake()->text(5),
            'require_local_agent' => fake()->boolean(),
            'type' => fake()->randomElement(array_column(PortType::cases(), 'value')),
            'location_type' => LocationType::PORT->value,
        ];
    }
}
