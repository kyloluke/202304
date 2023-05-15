<?php

use Services\Lp3Ship\App\Enums\ShipType;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\Ship;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship');

    // 本船情報がないことを確認
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('gets all ships', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Ship::factory()->count(15)->create();

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship');

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 返却されたデータの数が10であることを確認
    $result->assertJsonCount(15, 'data');
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

    // api call
    $result = $this->get(route('ship.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 返却されたデータの数が10であることを確認
    $resultData = json_decode($result->content());
    $this->assertEquals(2, count($resultData->data));
});

it('validate errors type incorrect number_0', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $shipTypeKey = array_rand($shipTypeArray, 1);
    $shipType_1 = $shipTypeArray[$shipTypeKey];

    $testDataArray = [
        [
            'name' => "test",
            'type' => $shipType_1
        ],

        [
            'name' => "test_2",
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
        'type' => 0
    ];


    $this->get(route('ship.index', $queryParameterArray))
        ->assertInvalid(['type']);
});


it('validate errors type incorrect number', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $shipTypeKey = array_rand($shipTypeArray, 1);
    $shipType_1 = $shipTypeArray[$shipTypeKey];

    $testDataArray = [
        [
            'name' => "test",
            'type' => $shipType_1
        ],

        [
            'name' => "test_2",
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
        'type' => rand($shipTypeArray[count($shipTypeArray) - 1], getrandmax()),
    ];

    $this->get(route('ship.index', $queryParameterArray))
        ->assertInvalid(['type']);
});
