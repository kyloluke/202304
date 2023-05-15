<?php

use Services\Lp3Core\App\Http\UseCases\Yard\Store;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\Refers\Models\CargoType;
use Tests\TestCase;

it('creates a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->create();
    $country = Country::factory()->create();
    $cargoTypes = CargoType::factory(3)->create();

    // 登録データ作成
    $data = [
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
        'yardGroupId' => $yardGroup->id,
    ];

    // ユースケース呼び出し
    $useCase = new Store();
    $result = $useCase($data);

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals($result->name_jp, $data['nameJp']);
    $this->assertEquals($result->name_en, $data['nameEn']);
    $this->assertEquals($result->country_id, $data['countryId']);
    $this->assertEquals($result->zipcode, $data['zipcode']);
    $this->assertEquals($result->state_jp, $data['stateJp']);
    $this->assertEquals($result->state_en, $data['stateEn']);
    $this->assertEquals($result->city_jp, $data['cityJp']);
    $this->assertEquals($result->city_en, $data['cityEn']);
    $this->assertEquals($result->address1_jp, $data['address1Jp']);
    $this->assertEquals($result->address2_jp, $data['address2Jp']);
    $this->assertEquals($result->address3_jp, $data['address3Jp']);
    $this->assertEquals($result->address1_en, $data['address1En']);
    $this->assertEquals($result->address2_en, $data['address2En']);
    $this->assertEquals($result->address3_en, $data['address3En']);
    $this->assertEquals($result->timezone, $data['timezone']);
    $this->assertEquals($result->naccs_bonded_area_code, $data['naccsBondedAreaCode']);
    $this->assertEquals($result->mail, $data['mail']);
    $this->assertEquals($result->telephone, $data['telephone']);
    $this->assertEquals($result->person_in_charge_jp, $data['personInChargeJp']);
    $this->assertEquals($result->person_in_charge_en, $data['personInChargeEn']);
    $this->assertEquals($result->capacity, $data['capacity']);
    $this->assertEquals($result->cc_when_carry_in_cy, $data['ccWhenCarryInCy']);
    $this->assertEquals($result->name_web, $data['nameWeb']);
    $this->assertEquals($result->map_url_web, $data['mapUrlWeb']);
    $this->assertEquals($result->cargoTypes[0]->id, $data['cargoTypeIds'][0]);
    $this->assertEquals($result->cargoTypes[1]->id, $data['cargoTypeIds'][1]);
    $this->assertEquals($result->cargoTypes[2]->id, $data['cargoTypeIds'][2]);
    $this->assertEquals($result->transport_method_web, $data['transportMethodWeb']);
    $this->assertEquals($result->yard_group_id, $data['yardGroupId']);


    $this->assertDatabaseHas('yards', [
        'name_jp' => $data['nameJp'],
        'name_en' => $data['nameEn'],
        'country_id' => $data['countryId'],
        'zipcode' => $data['zipcode'],
        'state_jp' => $data['stateJp'],
        'state_en' => $data['stateEn'],
        'city_jp' => $data['cityJp'],
        'city_en' => $data['cityEn'],
        'address1_jp' => $data['address1Jp'],
        'address2_jp' => $data['address2Jp'],
        'address3_jp' => $data['address3Jp'],
        'address1_en' => $data['address1En'],
        'address2_en' => $data['address2En'],
        'address3_en' => $data['address3En'],
        'timezone' => $data['timezone'],
        'naccs_bonded_area_code' => $data['naccsBondedAreaCode'],
        'mail' => $data['mail'],
        'telephone' => $data['telephone'],
        'person_in_charge_jp' => $data['personInChargeJp'],
        'person_in_charge_en' => $data['personInChargeEn'],
        'capacity' => $data['capacity'],
        'cc_when_carry_in_cy' => $data['ccWhenCarryInCy'],
        'name_web' => $data['nameWeb'],
        'map_url_web' => $data['mapUrlWeb'],
        'transport_method_web' => $data['transportMethodWeb'],
        'yard_group_id' => $data['yardGroupId'],
    ]);

    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $data['cargoTypeIds'][0]]);
    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $data['cargoTypeIds'][1]]);
    $this->assertDatabaseHas('yard_cargo_type', ['yard_id' => $result->id, 'cargo_type_id' => $data['cargoTypeIds'][2]]);
});
