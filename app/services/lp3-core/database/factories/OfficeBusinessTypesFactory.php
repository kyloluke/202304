<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Models\Office;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OfficeBusinessTypesFactory extends Factory
{
    protected $model = OfficeBusinessTypes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $office = Office::factory()->create();
        $user = User::factory()->create();
        return [
            'business_type' => fake()->randomElement(array_column(BusinessType::cases(), 'value')),
            'office_id' => $office->id,
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ];
    }
}
