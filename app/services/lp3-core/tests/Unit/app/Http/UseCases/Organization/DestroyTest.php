<?php

use Services\Lp3Core\App\Http\UseCases\Organization\Destroy;
use Services\Lp3Core\App\Models\Organization;
use Tests\TestCase;

it('deletes a organization', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetOrganization = Organization::factory()->create();

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($targetOrganization->id);

    // 削除したデータが指定したデータと一致していることを確認。
    $this->assertEquals($result->id, $targetOrganization->id);
    $this->assertEquals($result->name_jp, $targetOrganization->name_jp);
    $this->assertEquals($result->name_en, $targetOrganization->name_en);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($targetOrganization);
});
