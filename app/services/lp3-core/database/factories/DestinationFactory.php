<?php

namespace Services\Lp3Core\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Core\App\Models\Country;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $country = Country::factory()->create();
        $stateJp = ['神奈川県', '愛知県', '千葉県'];
        $stateEn = ['kanagawaken', 'aichiken', 'chibaken'];
        $cityJp = ['横浜', '名古屋', '千葉'];
        $cityEn = ['yokohama', 'nagoya', 'chiba'];
        $addressJp = ['港南区下永谷6-5-23 103', '東区白壁4-18-2', '千葉南区ホワイトモール222-2-2'];
        $i = fake()->numberBetween(0, 2);
        return [
            'name' => fake()->name,
            'location_type' => LocationType::DESTINATION->value,
            'country_id' => $country->id,
            'zip_code' => fake()->postcode,
            'state_jp' => $stateJp[$i],
            'state_en' => $stateEn[$i],
            'city_jp' => $cityJp[$i],
            'city_en' => $cityEn[$i],
            'address1_jp' => '1_' . $addressJp[$i],
            'address1_en' => '1_' . fake()->address,
            'address2_jp' => '2_' . $addressJp[$i],
            'address2_en' => '2_' . fake()->address,
            'address3_jp' => '3_' . $addressJp[$i],
            'address3_en' => '3_' . fake()->address,
            'unlo_code' => Str::random(40),
            'require_local_agent' => fake()->boolean,
            'naccs_code' => Str::random(40),
            'timezone' => Arr::random(array_column(TimeZone::cases(), 'value'))
        ];
    }
}
