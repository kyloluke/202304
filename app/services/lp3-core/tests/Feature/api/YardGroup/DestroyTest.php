<?php

use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('deletes a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create();

    // api call
    $result = $this->json('delete', 'api/lp3-core/yard-group/' . $targetYardGroup->id);

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 削除したデータがないことを確認
    $result = $this->json('get', 'api/lp3-core/yard-group/' . $targetYardGroup->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-core/yard-group/1');

    // 対象のデータがないことを確認
    $result->assertNotFound();
});
