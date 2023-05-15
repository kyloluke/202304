<?php

use Services\Lp3Ship\App\Enums\ShipType;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\Ship;

it('validate errors name and type are empty', function () {
    /** @var TestCase $this */
    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $dataForUpdating = [
        'name' => "",
        'type' => ""
    ];

    $this
        ->json('put', 'api/lp3-ship/ship/' . $targetShip->id, $dataForUpdating)
        ->assertJsonValidationErrors(['name', 'type']);
});

it('validate errors name and type incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $dataForUpdating = [
        'name' => 10,
        'type' => "aiueo"
    ];

    $this
        ->json('put', 'api/lp3-ship/ship/' . $targetShip->id, $dataForUpdating)
        ->assertJsonValidationErrors(['name', 'type']);
});

it('validate errors type incorrect number_0', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $dataForUpdating = [
        'name' => "test",
        'type' => 0
    ];

    $this
        ->json('put', 'api/lp3-ship/ship/' . $targetShip->id, $dataForUpdating)
        ->assertJsonValidationErrors(['type']);
});

it('validate errors type incorrect number', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $dataForUpdating = [
        'name' => "test",
        'type' => rand($shipTypeArray[count($shipTypeArray) - 1], getrandmax()),
    ];

    $this
        ->json('put', 'api/lp3-ship/ship/' . $targetShip->id, $dataForUpdating)
        ->assertJsonValidationErrors(['type']);
});

it('updates a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $dataForUpdating = [
        'name' => "test_2",
        'type' => 2
    ];

    // api call
    $result = $this->json('put', 'api/lp3-ship/ship/' . $targetShip->id, $dataForUpdating);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content())->data;
    $this->assertEquals($resultData->id, $targetShip->id);
    $this->assertEquals($resultData->name, $dataForUpdating['name']);
    $this->assertEquals($resultData->type, $dataForUpdating['type']);
});

it('no data', function () {
    /** @var TestCase $this */

    // 更新内容作成
    $dataForUpdating = [
        'name' => "test",
        'type' => 1
    ];

    // api call
    $result = $this->json('put', 'api/lp3-ship/ship/100', $dataForUpdating);

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});
