<?php

use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\UseCases\Yard\Exceptions\YardSaveException;
use Services\Lp3Core\App\Http\UseCases\Yard\Update;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\Refers\Models\CargoType;
use Tests\TestCase;

it('occurs change belonging to exception', function () {
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
        'nameJp' => "テスト",
        'nameEn' => "test",
        'countryId' => $targetYard->country_id,
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
        'cargoTypeIds' => [],
        'transportMethodWeb' => "コンテナ船",
        'yardGroupId' => $yardGroups[1]->id,
        'status' => $targetYard->status,
    ];

    // 例外が返ってくることを確認
    $this->expectException(YardSaveException::class);

    // ユースケース呼び出し
    $useCase = new Update();
    $useCase($targetYard, $dataForUpdating);
});

it('occurs inactive representative yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $testData = [
        'yard_group_id' => $yardGroup->id
    ];
    $yards = Yard::factory(3)->create($testData);
    $targetYard = $yards[0];

    // テスト対象のヤードを代表ヤードにするため、所属先ヤードグループの情報を更新
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $yardGroup->id, ['name' => $yardGroup->name, 'representativeYardId' => $targetYard->id]);

    // 更新内容作成
    $dataForUpdating = [
        'nameJp' => "テスト",
        'nameEn' => "test",
        'countryId' => $targetYard->country_id,
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
        'cargoTypeIds' => [],
        'transportMethodWeb' => "コンテナ船",
        'yardGroupId' => $yardGroup->id,
        'status' => YardStatus::DISABLE->value,
    ];

    // 例外が返ってくることを確認
    $this->expectException(YardSaveException::class);

    // ユースケース呼び出し
    $useCase = new Update();
    $useCase($targetYard, $dataForUpdating);
});

it('update a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroups = YardGroup::factory(2)->create();
    $testData = [
        'name_jp' => "テスト",
        'name_en' => "test",
        'yard_group_id' => $yardGroups[0]->id
    ];
    $targetYard = Yard::factory()
        ->hasAttached(CargoType::factory(2), [], 'cargoTypes')
        ->create($testData);

    $beforeUpdatingCargoTypeIds = $targetYard->cargoTypes()->pluck('cargo_type_id')->toArray();

    // 更新内容作成
    $country = Country::factory()->create();
    $cargoTypes = CargoType::factory(3)->create();

    // 登録データ作成
    $dataForUpdating = [
        'nameJp' => "テスト",
        'nameEn' => "",
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
        'yardGroupId' => $yardGroups[1]->id,
        'status' => YardStatus::DISABLE->value,
    ];

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($targetYard, $dataForUpdating);

    // 更新内容と更新後のテストデータが一致していることを確認
    $this->assertEquals($result->id, $targetYard->id);
    $this->assertEquals($result->name_jp, $dataForUpdating['nameJp']);
    $this->assertEquals($result->name_en, $dataForUpdating['nameEn']);
    $this->assertEquals($result->country_id, $dataForUpdating['countryId']);
    $this->assertEquals($result->zipcode, $dataForUpdating['zipcode']);
    $this->assertEquals($result->state_jp, $dataForUpdating['stateJp']);
    $this->assertEquals($result->state_en, $dataForUpdating['stateEn']);
    $this->assertEquals($result->city_jp, $dataForUpdating['cityJp']);
    $this->assertEquals($result->city_en, $dataForUpdating['cityEn']);
    $this->assertEquals($result->address1_jp, $dataForUpdating['address1Jp']);
    $this->assertEquals($result->address2_jp, $dataForUpdating['address2Jp']);
    $this->assertEquals($result->address3_jp, $dataForUpdating['address3Jp']);
    $this->assertEquals($result->address1_en, $dataForUpdating['address1En']);
    $this->assertEquals($result->address2_en, $dataForUpdating['address2En']);
    $this->assertEquals($result->address3_en, $dataForUpdating['address3En']);
    $this->assertEquals($result->timezone, $dataForUpdating['timezone']);
    $this->assertEquals($result->naccs_bonded_area_code, $dataForUpdating['naccsBondedAreaCode']);
    $this->assertEquals($result->mail, $dataForUpdating['mail']);
    $this->assertEquals($result->telephone, $dataForUpdating['telephone']);
    $this->assertEquals($result->person_in_charge_jp, $dataForUpdating['personInChargeJp']);
    $this->assertEquals($result->person_in_charge_en, $dataForUpdating['personInChargeEn']);
    $this->assertEquals($result->capacity, $dataForUpdating['capacity']);
    $this->assertEquals($result->cc_when_carry_in_cy, $dataForUpdating['ccWhenCarryInCy']);
    $this->assertEquals($result->name_web, $dataForUpdating['nameWeb']);
    $this->assertEquals($result->map_url_web, $dataForUpdating['mapUrlWeb']);
    $this->assertEquals($result->cargoTypes[0]->id, $dataForUpdating['cargoTypeIds'][0]);
    $this->assertEquals($result->cargoTypes[1]->id, $dataForUpdating['cargoTypeIds'][1]);
    $this->assertEquals($result->cargoTypes[2]->id, $dataForUpdating['cargoTypeIds'][2]);
    $this->assertEquals($result->transport_method_web, $dataForUpdating['transportMethodWeb']);
    $this->assertEquals($result->yard_group_id, $dataForUpdating['yardGroupId']);
    $this->assertEquals($result->status, $dataForUpdating['status']);

    // 更新内容がDBに存在することを確認
    $this->assertDatabaseHas('yards', [
        'name_jp' => $dataForUpdating['nameJp'],
        'name_en' => $dataForUpdating['nameEn'],
        'country_id' => $dataForUpdating['countryId'],
        'zipcode' => $dataForUpdating['zipcode'],
        'state_jp' => $dataForUpdating['stateJp'],
        'state_en' => $dataForUpdating['stateEn'],
        'city_jp' => $dataForUpdating['cityJp'],
        'city_en' => $dataForUpdating['cityEn'],
        'address1_jp' => $dataForUpdating['address1Jp'],
        'address2_jp' => $dataForUpdating['address2Jp'],
        'address3_jp' => $dataForUpdating['address3Jp'],
        'address1_en' => $dataForUpdating['address1En'],
        'address2_en' => $dataForUpdating['address2En'],
        'address3_en' => $dataForUpdating['address3En'],
        'timezone' => $dataForUpdating['timezone'],
        'naccs_bonded_area_code' => $dataForUpdating['naccsBondedAreaCode'],
        'mail' => $dataForUpdating['mail'],
        'telephone' => $dataForUpdating['telephone'],
        'person_in_charge_jp' => $dataForUpdating['personInChargeJp'],
        'person_in_charge_en' => $dataForUpdating['personInChargeEn'],
        'capacity' => $dataForUpdating['capacity'],
        'cc_when_carry_in_cy' => $dataForUpdating['ccWhenCarryInCy'],
        'name_web' => $dataForUpdating['nameWeb'],
        'map_url_web' => $dataForUpdating['mapUrlWeb'],
        'transport_method_web' => $dataForUpdating['transportMethodWeb'],
        'yard_group_id' => $dataForUpdating['yardGroupId'],
        'status' => $dataForUpdating['status'],
    ]);

    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $dataForUpdating['cargoTypeIds'][0]]);
    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $dataForUpdating['cargoTypeIds'][1]]);
    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $dataForUpdating['cargoTypeIds'][2]]);
    $this->assertDatabaseMissing('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $beforeUpdatingCargoTypeIds[0]]);
    $this->assertDatabaseMissing('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $beforeUpdatingCargoTypeIds[1]]);
});
