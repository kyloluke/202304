<?php

use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/yard/100');

    // 対象のデータ情報がないことを確認
    $result->assertNotFound();
});

it('gets a yard by id', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYard = Yard::factory()->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/yard/' . $targetYard->id);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();
});
