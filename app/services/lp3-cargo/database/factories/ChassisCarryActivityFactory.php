<?php

namespace Services\Lp3Cargo\Database\Factories;

use Services\Lp3Cargo\App\Enums\ChassisCarryType;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\Refers\Models\Yard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChassisCarryActivityFactory extends Factory
{
    protected $model = ChassisCarryActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $chassis = Chassis::factory()->create();
        $yard = Yard::factory()->create();
        return [
            'chassis_id' => $chassis->id,
            'prospect' => fake()->boolean,
            'act_at' => fake()->dateTimeThisMonth,
            'author_id' => 1,
            'auth_at' => fake()->dateTime,
            'remarks' => fake()->text(250),
            'admin_remarks' => fake()->text(250),
            'grouping_value' => fake()->text(250),
            'yard_id' => $yard->id,
            'type' => Arr::random(array_column(ChassisCarryType::cases(), 'value'))
        ];
    }
}
