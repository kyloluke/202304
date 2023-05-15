<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\Ship;

it('deletes a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetShip = Ship::factory()->create();

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship/' . $targetShip->id);

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 削除した本船情報がないことを確認
    $result = $this->json('get', 'api/lp3-ship/ship/' . $targetShip->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship/1');

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});
