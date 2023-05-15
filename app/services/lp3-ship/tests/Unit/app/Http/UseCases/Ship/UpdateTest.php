<?php

use Services\Lp3Ship\App\Http\UseCases\Ship\Update;
use Services\Lp3Ship\App\Models\Ship;
use Tests\TestCase;

it('update a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];
    $targetShip = Ship::factory()->create($data);

    // 更新内容作成
    $dataForUpdating = [
        'name' => "test_updated",
        'type' => 2
    ];

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($dataForUpdating, $targetShip->id);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result->id, $targetShip->id);
    $this->assertEquals($result->name, $dataForUpdating['name']);
    $this->assertEquals($result->type, $dataForUpdating['type']);
});
