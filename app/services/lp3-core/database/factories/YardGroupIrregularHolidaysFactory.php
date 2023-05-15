<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\App\Models\YardGroupIrregularHolidays;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class YardGroupIrregularHolidaysFactory extends Factory
{
    protected $model = YardGroupIrregularHolidays::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $yardGroup = YardGroup::factory()->create();
        return [
            'yard_group_id' => $yardGroup->id,
            'date' => fake()->dateTimeBetween('+1 week', '+2 week'),
        ];
    }
}
