<?php

use Services\Lp3Ship\App\Enums\ShipType;
use Tests\TestCase;

it('validate errors name and type are empty', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "",
        'type' => ""
    ];

    $this
        ->json('post', 'api/lp3-ship/ship', $data)
        ->assertJsonValidationErrors(['name', 'type']);
});

it('validate errors name and type incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => 10,
        'type' => "aiueo"
    ];

    $this
        ->json('post', 'api/lp3-ship/ship', $data)
        ->assertJsonValidationErrors(['name', 'type']);
});

it('validate errors type incorrect number_0', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "test",
        'type' => 0
    ];

    $this
        ->json('post', 'api/lp3-ship/ship', $data)
        ->assertJsonValidationErrors(['type']);
});

it('validate errors type incorrect number', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $shipTypeArray = array_column(ShipType::cases(), 'value');
    $data = [
        'name' => "test",
        'type' => rand($shipTypeArray[count($shipTypeArray) - 1], getrandmax()),
    ];

    $this
        ->json('post', 'api/lp3-ship/ship', $data)
        ->assertJsonValidationErrors(['type']);
});

it('creates a ship', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    // api call
    $result = $this->json('post', 'api/lp3-ship/ship', $data);

    // レスポンスが正常に返ってくることを確認
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content())->data;
    $this->assertEquals($resultData->name, $data['name']);
    $this->assertEquals($resultData->type, $data['type']);
});
