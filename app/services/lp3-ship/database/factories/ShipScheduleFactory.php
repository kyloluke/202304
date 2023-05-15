<?php

namespace Services\Lp3Ship\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Ship\App\Models\ShipCompany;
use Illuminate\Support\Str;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipSchedule;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ShipScheduleFactory extends Factory
{
    protected $model = ShipSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake();
        $ship = Ship::factory()->create();
        $shipCompany = ShipCompany::factory()->create();

        return [
            'ship_id' => $ship->id,
            'ship_company_id' => $shipCompany->id,
            'voyage_number' => Str::random(30),
            'remarks' => $faker->sentence,
            'refer_url' => $faker->url,
            'type' => null
        ];
    }
}
