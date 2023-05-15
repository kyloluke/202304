<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\InspectionType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InspectionTypeFactory extends Factory
{
    protected $model = InspectionType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = ['JAAI', 'INTERTEK', 'EAA', 'MAF', 'JEVIC'];
        return [
            'name' => fake()->randomElement($arr)
        ];
    }
}
