<?php

namespace Services\Lp3Sales\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Sales\App\Models\Quotation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuotationFactory extends Factory
{
    protected $model = Quotation::class;

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
