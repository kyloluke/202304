<?php

use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\Refers\Models\CargoType;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

it('validate errors required params are empty', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $testData = [
        'name_jp' => "テスト",
        'name_en' => "test",
        'yard_group_id' => $yardGroup->id
    ];
    $targetYard = Yard::factory()->create($testData);

    // 更新内容作成
    $dataForUpdating = [
        'nameJp' => "",
        'nameEn' => "",
        'yardGroupId' => "",
    ];

    $this
        ->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating)
        ->assertJsonValidationErrors(array_keys($dataForUpdating));
});

it('validate errors string params are incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $testData = [
        'name_jp' => "テスト",
        'name_en' => "test",
        'yard_group_id' => $yardGroup->id
    ];
    $targetYard = Yard::factory()->create($testData);

    // 更新内容作成
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

    $otherData = [
        'yardGroupId' => $yardGroup->id,
        'status' => 1
    ];

    $dataForUpdating = array_merge($data, $otherData);

    // api call
    $this
        ->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating)
        ->assertJsonValidationErrors(array_keys($data));
});

it('validate errors boolean or integer params are incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $testData = [
        'name_jp' => "テスト",
        'name_en' => "test",
        'yard_group_id' => $yardGroup->id
    ];
    $targetYard = Yard::factory()->create($testData);

    // 更新内容作成
    $data = [
        'countryId' => 'test',
        'capacity' => 'test',
        'ccWhenCarryInCy' => 'test',
        'cargoTypeIds' => ['test', 'testTEST'],
        'yardGroupId' => 'test',
        'status' => 'test',
    ];

    $otherData = [
        'nameJp' => 'テスト',
        'nameEn' => 'test',
    ];

    $dataForUpdating = array_merge($data, $otherData);

    // api call
    $this
        ->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating)
        ->assertJsonValidationErrors([
            'countryId',
            'capacity',
            'ccWhenCarryInCy',
            'cargoTypeIds.0',
            'cargoTypeIds.1',
            'yardGroupId',
            'status'
        ]);
});

it('get response bad request cuz changing belonging to exception', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroups = YardGroup::factory(2)->create();
    $testData = [
        'yard_group_id' => $yardGroups[0]->id
    ];
    $yards = Yard::factory(3)->create($testData);
    $targetYard = $yards[0];

    // テスト対象のヤードを代表ヤードにするため、所属先ヤードグループの情報を更新
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $yardGroups[0]->id, ['name' => $yardGroups[0]->name, 'representativeYardId' => $targetYard->id]);

    // 更新内容作成
    $dataForUpdating = [
        'nameJp' => $targetYard->name_jp,
        'nameEn' => $targetYard->name_en,
        'yardGroupId' => $yardGroups[1]->id,
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('get response bad request cuz inactive representative yard exception', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $testData = [
        'yard_group_id' => $yardGroup->id
    ];
    $targetYard = Yard::factory(2)->create($testData)[0];

    // テスト対象のヤードを代表ヤードにするため、所属先ヤードグループの情報を更新
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $yardGroup->id, ['name' => $yardGroup->name, 'representativeYardId' => $targetYard->id]);

    // 更新内容作成
    $dataForUpdating = [
        'nameJp' => $targetYard->name_jp,
        'nameEn' => $targetYard->name_en,
        'yardGroupId' => $yardGroup->id,
        'status' => YardStatus::DISABLE->value,
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('updates a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroups = YardGroup::factory(2)->create();
    $testData = [
        'name_jp' => "テスト",
        'name_en' => "test",
        'yard_group_id' => $yardGroups[0]->id
    ];
    $targetYard = Yard::factory()->create($testData);

    // 更新内容作成
    $country = Country::factory()->create();
    $cargoTypes = CargoType::factory(3)->create();

    // 更新内容作成
    $dataForUpdating = [
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
        'ccWhenCarryInCy' => true,
        'nameWeb' => "株式会社テストヤード",
        'mapUrlWeb' => "hhhh//pppp.tst.xxxx",
        'cargoTypeIds' => [
            $cargoTypes[0]->id,
            $cargoTypes[1]->id,
            $cargoTypes[2]->id
        ],
        'transportMethodWeb' => "コンテナ船",
        'yardGroupId' => $yardGroups[1]->id,
        'status' => YardStatus::DISABLE->value,
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/yard/' . $targetYard->id, $dataForUpdating);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();

    // 更新内容作成
    $dataForUpdating = [
        'nameJp' => "テスト",
        'nameEn' => "test",
        'yardGroupId' => $yardGroup->id,
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/yard/100', $dataForUpdating);

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});
