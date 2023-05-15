<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\App\Models\YardGroupRegularHolidays;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class YardGroupRegularHolidaysFactory extends Factory
{
    protected $model = YardGroupRegularHolidays::class;

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
            'start_date' => fake()->datetime('Y-m-d h:i:s', 'UTC'),
            'end_date' => null,
            // ※ ヤードグループ単位で見たとき、end_dateがnullになるカラムは１つだけのため、本番に近い形でテストする場合は別途日付を入れる処理を書く必要がある。
            'monday_flg' => fake()->boolean(),
            'tuesday_flg' => fake()->boolean(),
            'wednesday_flg' => fake()->boolean(),
            'thursday_flg' => fake()->boolean(),
            'friday_flg' => fake()->boolean(),
            'saturday_flg' => fake()->boolean(),
            'sunday_flg' => fake()->boolean(),
            'national_holidays_flg' => fake()->boolean(),
        ];
    }
}
