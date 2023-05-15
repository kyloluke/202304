<?php

namespace Services\Lp3Sales\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Sales\App\Models\Billing;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BillingFactory extends Factory
{
    protected $model = Billing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        ];
    }
}
