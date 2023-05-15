<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\SystemUsage;
use Services\Lp3Core\App\Models\Organization;
use Services\Lp3Core\App\Models\OrganizationLogoFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_jp' => fake()->name(),
            'name_en' => fake()->name(),
            'canonical_name' => fake()->name(),
            'name_abbr' => fake()->name(),
            'representative_name' => fake()->name(),
            'system_usage' => fake()->randomElement(array_column(SystemUsage::cases(), 'value')),
            'use_logo_file_id' => OrganizationLogoFile::factory()->create()->id,
        ];
    }
}
