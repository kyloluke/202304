<?php

use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Store;
use Tests\TestCase;
use Illuminate\Support\Arr;
use Services\Lp3Core\App\Models\Country;

it('creates a ship-company', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();
    // 登録用データ作成
    $data = [
        'name' => 'ODYSSEY MARITIME PTE LTD.',
        'scacCode' => '11AC',
        'mail' => 'ship@company.com',
        'remarks' => 'test 備考',
        'countryId' => $country->id,
        'zipCode' => '120 1111',
        'stateJp' => '神奈川県',
        'stateEn' => 'kanagawaken',
        'cityJp' => '横浜',
        'cityEn' => 'yokohama',
        'address1Jp' => '111港南区下永谷6-5-23 103',
        'address1En' => '111english address 6-5-23 103',
        'address2Jp' => '222港南区下永谷6-5-23 103',
        'address2En' => '222english address 6-5-23 103',
        'address3Jp' => '333港南区下永谷6-5-23 103',
        'address3En' => '333english address 6-5-23 103',
        'timezone' => 3,
    ];

    $tempArr = [];
    foreach($data as $key => $val) {
        $tempArr[Str::snake($key)] = $val;
    }

    // ユースケース呼び出し
    $useCase = new Store();
    $resArr = $useCase($data)->toArray();

    // 登録内容と登録用データが一致していることを確認
    $resArr = Arr::except($resArr, ['id', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at']);
    $this->assertEquals($tempArr, $resArr);
});
