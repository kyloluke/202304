<?php

namespace Services\Lp3Sales\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccountTitleFactory extends Factory
{
    protected $model = AccountTitle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(20),
            'name_en' => fake()->text(20),
            'code' => fake()->text(20),
            'available' => true,
            'ordinary' => 0,
        ];
    }
}
