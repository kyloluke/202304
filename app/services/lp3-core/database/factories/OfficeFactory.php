<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Enums\OfficeStatus;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Office;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Organization;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OfficeFactory extends Factory
{
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_jp' => fake()->company(),
            'name_en' => fake()->company(),
            'remarks' => fake()->text(20),
            'status' => fake()->randomElement(array_column(OfficeStatus::cases(), 'value')),
            'country_id' => Country::factory()->create()->id,
            'zip_code' => fake()->postcode(),
            'state_jp' => fake()->name(),
            'state_en' => fake()->name(),
            'city_jp' => fake()->city(),
            'city_en' => fake()->city(),
            'address1_jp' => fake()->address(),
            'address1_en' => fake()->address(),
            'address2_jp' => fake()->address(),
            'address2_en' => fake()->address(),
            'address3_jp' => fake()->address(),
            'address3_en' => fake()->address(),
            'timezone' => fake()->timezone(),
            'organization_id' => Organization::factory()->create()->id
        ];
    }

    /**
     * 業態を設定する
     *
     * @param BusinessType[] $businessTypes
     * @return OfficeFactory
     */
    public function businessTypes(array $businessTypes): static
    {
        $result = $this;

        foreach ($businessTypes as $businessType) {
            $factory = OfficeBusinessTypes::factory()->state(['business_type' => $businessType]);
            $result = $result->has($factory, 'officeBusinessTypes');
        }

        return $result;
    }
}
