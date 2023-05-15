<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\Organization;
use Services\Lp3Core\App\Models\OrganizationLogoFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationLogoFileFactory extends Factory
{
    protected $model = OrganizationLogoFile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'logo_file_uri' => fake()->url(),
            'logo_file_name' => fake()->name(),
            'logo_file_mime' => "png",
        ];
    }
}
