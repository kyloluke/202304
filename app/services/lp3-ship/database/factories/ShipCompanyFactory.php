<?php

namespace Services\Lp3Ship\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Ship\Refers\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ShipCompanyFactory extends Factory
{
    protected $model = ShipCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake();
        // country_id
        $country = Country::factory()->create();
        // address
        $stateJp = ['神奈川県', '愛知県', '千葉県'];
        $stateEn = ['kanagawaken', 'aichiken', 'chibaken'];
        $cityJp = ['横浜', '名古屋', '千葉'];
        $cityEn = ['yokohama', 'nagoya', 'chiba'];
        $addressJp = ['港南区下永谷6-5-23 103', '東区白壁4-18-2', '千葉南区ホワイトモール222-2-2'];
        $i = $faker->numberBetween(0, 2);

        return [
            'name' => $faker->company,
            'scac_code' => Str::random(4),
            'mail' => $faker->email,
            'remarks' => Str::random(30),
            'country_id' => $country->id,
            'zip_code' => $faker->countryCode,
            'state_jp' => $stateJp[$i],
            'state_en' => $stateEn[$i],
            'city_jp' => $cityJp[$i],
            'city_en' => $cityEn[$i],
            'address1_jp' => '1_' . $addressJp[$i],
            'address1_en' => '1_' . $faker->address,
            'address2_jp' => '2_' . $addressJp[$i],
            'address2_en' => '2_' . $faker->address,
            'address3_jp' => '3_' . $addressJp[$i],
            'address3_en' => '3_' . $faker->address,
            'timezone' => Arr::random(array_column(TimeZone::cases(), 'value')),
        ];
    }
}
