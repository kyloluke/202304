<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Region;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 地域を取得する、取得しない場合は、ひとまず、１を設定する
        $region = Region::factory()->create();
        $names = ['Japan', 'China', 'American', 'Korea'];
        return [
            'name' => fake()->randomElement($names),
            'region_id' => $region->id
        ];
    }
}
