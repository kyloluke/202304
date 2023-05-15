<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\Organization;
use Services\Lp3Core\App\Models\YardGroup;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class YardGroupFactory extends Factory
{
    protected $model = YardGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // representative_yard_idに関しては、Yard側でもYardGroupの作成が必要であり、無限ループを発生させてしまうことから、空で作成するようにしております。

        return [
            'name' => fake()->company(),
            'reception_time_weekdays_from' => fake()->time(),
            'reception_time_weekdays_to' => fake()->time(),
            'reception_time_saturday_from' => fake()->time(),
            'reception_time_saturday_to' => fake()->time(),
            'rest_time_from' => fake()->time(),
            'rest_time_to' => fake()->time(),
            'organization_id' => Organization::factory()->create()->id,
        ];
    }
}
