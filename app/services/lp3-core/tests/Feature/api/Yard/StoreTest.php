<?php

use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\Refers\Models\CargoType;
use Tests\TestCase;

it('validate errors required params are empty', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'nameJp' => "",
        'nameEn' => "",
        'yardGroupId' => "",
    ];

    $this
        ->json('post', 'api/lp3-core/yard', $data)
        ->assertJsonValidationErrors(array_keys($data));
});

it('validate errors string params are incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();

    // 登録データ作成
    $data = [
        'nameJp' => 1,
        'nameEn' => 1,
        'zipcode' => 1,
        'stateJp' => 1,
        'stateEn' => 1,
        'cityJp' => 1,
        'cityEn' => 1,
        'address1Jp' => 1,
        'address2Jp' => 1,
        'address3Jp' => 1,
        'address1En' => 1,
        'address2En' => 1,
        'address3En' => 1,
        'timezone' => 1,
        'naccsBondedAreaCode' => 1,
        'mail' => 1,
        'telephone' => 1,
        'personInChargeJp' => 1,
        'personInChargeEn' => 1,
        'nameWeb' => 1,
        'mapUrlWeb' => 1,
        'transportMethodWeb' => 1,
    ];

    $requestData = array_merge($data, ['yardGroupId' => $yardGroup->id]);

    // api call
    $this
        ->json('post', 'api/lp3-core/yard', $requestData)
        ->assertJsonValidationErrors(array_keys($data));
});

it('validate errors boolean or integer params are incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'countryId' => 'test',
        'capacity' => 'test',
        'ccWhenCarryInCy' => 'test',
        'cargoTypeIds' => ['test', 'testTEST'],
        'yardGroupId' => 'test',
    ];

    $otherData = [
        'nameJp' => 'テスト',
        'nameEn' => 'test',
    ];

    $requestData = array_merge($data, $otherData);

    // api call
    $this
        ->json('post', 'api/lp3-core/yard/', $requestData)
        ->assertJsonValidationErrors([
            'countryId',
            'capacity',
            'ccWhenCarryInCy',
            'cargoTypeIds.0',
            'cargoTypeIds.1',
            'yardGroupId',
        ]);
});

it('creates a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $country = Country::factory()->create();
    $cargoTypes = CargoType::factory(3)->create();

    // 登録データ作成
    $data = [
        'nameJp' => "テスト",
        'nameEn' => "test",
        'countryId' => $country->id,
        'zipcode' => "111-1111",
        'stateJp' => "テスト県",
        'stateEn' => "TEST State",
        'cityJp' => "テスト市",
        'cityEn' => "TEST City",
        'address1Jp' => "テスト県",
        'address2Jp' => "テスト町1-1-1",
        'address3Jp' => "テストビルディング111",
        'address1En' => "TEST",
        'address2En' => "TEST City 1-1-1",
        'address3En' => "TEST Bld.",
        'timezone' => "UTC",
        'naccsBondedAreaCode' => "xxxx10",
        'mail' => "test@test.xx.xxx",
        'telephone' => "00-0000-0000",
        'personInChargeJp' => "田中",
        'personInChargeEn' => "Tanaka",
        'capacity' => "100",
        'ccWhenCarryInCy' => "1",
        'nameWeb' => "株式会社テストヤード",
        'mapUrlWeb' => "hhhh//pppp.tst.xxxx",
        'cargoTypeIds' => [
            $cargoTypes[0]->id,
            $cargoTypes[1]->id,
            $cargoTypes[2]->id
        ],
        'transportMethodWeb' => "コンテナ船",
        'yardGroupId' => $yardGroup->id,
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/yard', $data);

    // レスポンスが正常に返ってくることを確認
    $result->assertCreated();
});
