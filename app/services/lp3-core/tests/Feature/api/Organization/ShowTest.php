<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Organization;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/organization/100');

    // 対象のデータがないことを確認
    $result->assertNotFound();
});

it('gets a yard group by id', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetOrganization = Organization::factory()->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/organization/' . $targetOrganization->id);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();
});
