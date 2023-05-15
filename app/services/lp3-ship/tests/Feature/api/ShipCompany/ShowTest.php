<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Ship\Refers\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Services\Lp3Core\App\Enums\TimeZone;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-company/100');

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});

it('gets a ship-company by id', function () {
    /** @var TestCase $this */
    $country = Country::factory()->create();
    $reqData = [
        'name' => '名称',
        'scac_code' => '船会社コード',
        'mail' => 'example@example.com',
        'remarks' => 'remarks',
        'country_id' => $country->id,
        'zip_code' => 'zipCode',
        'state_jp' => 'stateJp',
        'state_en' => 'stateEn',
        'city_jp' => 'cityJp',
        'city_en' => 'cityEn',
        'address1_jp' => 'address1Jp',
        'address1_en' => 'address1En',
        'address2_jp' => 'address2Jp',
        'address2_en' => 'address2En',
        'address3_jp' => 'address3Jp',
        'address3_en' => 'address3En',
        'timezone' => Arr::random(array_column(TimeZone::cases(), "value")),
    ];

    $shipCompany = ShipCompany::factory()->create($reqData);

    $result = $this->json('get', 'api/lp3-ship/ship-company/' . $shipCompany->id);
    $result->assertOk();
    $resData = json_decode($result->content(), true)['data'];
    $resData = Arr::sort(Arr::except($resData, ['deletedBy', 'deletedAt', 'createdBy', 'createdAt', 'updatedBy', 'updatedAt', 'id', 'country'])); // 返すカラムはキャメルケース

    $originData = [];
    foreach ($reqData as $key => $val) {
        $originData[Str::camel($key)] = $val;
    }
    $originData = Arr::sort($originData);
    $this->assertEquals($originData, $resData);
});
