<?php

use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/yard-group/100');

    // 対象のデータがないことを確認
    $result->assertNotFound();
});

it('gets a yard group by id', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/yard-group/' . $targetYardGroup->id);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();
});
