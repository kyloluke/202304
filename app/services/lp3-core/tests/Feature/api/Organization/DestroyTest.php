<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Organization;

it('deletes a organization', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetOrganization = Organization::factory()->create();

    // api call
    $result = $this->json('delete', 'api/lp3-core/organization/' . $targetOrganization->id);

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 削除したデータがないことを確認
    $result = $this->json('get', 'api/lp3-core/organization/' . $targetOrganization->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-core/organization/1');

    // 対象のデータがないことを確認
    $result->assertNotFound();
});
