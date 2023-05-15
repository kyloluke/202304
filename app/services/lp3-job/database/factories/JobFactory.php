<?php

namespace Services\Lp3Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Job\App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

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
