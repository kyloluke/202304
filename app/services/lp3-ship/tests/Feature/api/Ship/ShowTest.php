<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\Ship;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship/100');

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});

it('gets a ship by id', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    $targetShip = Ship::factory()->create($data);

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship/' . $targetShip->id);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 取得内容と作成したテストデータが一致していることを確認
    $resultData = json_decode($result->content())->data;
    $this->assertEquals($resultData->name, $data['name']);
    $this->assertEquals($resultData->type, $data['type']);
});
