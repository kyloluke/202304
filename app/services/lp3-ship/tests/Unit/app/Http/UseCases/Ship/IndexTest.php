<?php

use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Http\UseCases\Ship\Index;
use Services\Lp3Ship\App\Models\Ship;
use Tests\TestCase;

it('gets all ships', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $shipTypeKeyArray = array_rand($shipTypeArray, 2);
    $shipType_1 = $shipTypeArray[$shipTypeKeyArray[0]];
    $shipType_2 = $shipTypeArray[$shipTypeKeyArray[1]];

    $data_1 = [
        'name' => "test",
        'type' => $shipType_1
    ];

    $data_2 = [
        'name' => "test_2",
        'type' => $shipType_2
    ];

    $ship_1 = Ship::factory()->create($data_1);
    $ship_2 = Ship::factory()->create($data_2);

    // ユースケース呼び出し
    $useCase = new Index();
    $queryParameterArray = [
        'name' => null,
        'type' => null
    ]; // $useCaseの引数として必要なため定義
    $result = $useCase($queryParameterArray);

    // 取得件数が2件であることを確認
    $this->assertEquals(count($result->items()), 2);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result[0]->name, $ship_1->name);
    $this->assertEquals($result[1]->name, $ship_2->name);
    $this->assertEquals($result[0]->type, $ship_1->type);
    $this->assertEquals($result[1]->type, $ship_2->type);
});

it('searches ships by name and type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $shipTypeKeyArray = array_rand($shipTypeArray, 2);
    $shipType_1 = $shipTypeArray[$shipTypeKeyArray[0]];
    $shipType_2 = $shipTypeArray[$shipTypeKeyArray[1]];


    $testDataArray = [
        [
            'name' => "test",
            'type' => $shipType_1
        ],

        [
            'name' => "test_2",
            'type' => $shipType_1
        ],

        [
            'name' => "test",
            'type' => $shipType_2
        ],

        [
            'name' => "テスト",
            'type' => $shipType_1
        ],
    ];

    $createdShipArray = [];

    foreach ($testDataArray as $testData) {
        $targetShip = Ship::factory()->create($testData);
        $createdShipArray[] = $targetShip;
    }

    // 検索条件を設定
    $queryParameterArray = [
        'name' => "test",
        'type' => $shipType_1,
    ];

    // ユースケース呼び出し
    $useCase = new Index();
    $result = $useCase($queryParameterArray);

    // 取得件数が2件であることを確認
    $this->assertEquals(count($result->items()), 2);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result[0]->name, $createdShipArray[0]->name);
    $this->assertEquals($result[1]->name, $createdShipArray[1]->name);
    $this->assertEquals($result[0]->type, $createdShipArray[0]->type);
    $this->assertEquals($result[1]->type, $createdShipArray[1]->type);
});
