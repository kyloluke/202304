<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class YardFactory extends Factory
{
    protected $model = Yard::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $yardGroup = YardGroup::factory()->create();

        return [
            'name_jp' => fake()->name(),
            'name_en' => fake()->name(),
            'zipcode' => fake()->postcode(),
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
            'naccs_bonded_area_code' => fake()->text(5),
            'mail' => fake()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'person_in_charge_jp' => fake()->name(),
            'person_in_charge_en' => fake()->name(),
            'capacity' => fake()->numberBetween(),
            'cc_when_carry_in_cy' => fake()->boolean(),
            'name_web' => fake()->company(),
            'map_url_web' => fake()->url(),
            'transport_method_web' => "コンテナ船",
            'status' => YardStatus::ENABLE->value,
            'yard_group_id' => $yardGroup->id,
        ];
    }
}
