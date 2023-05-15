<?php

use Services\Lp3Core\App\Http\UseCases\YardGroup\Destroy;
use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('deletes a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create();

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($targetYardGroup->id);

    // 削除したデータが指定したデータと一致していることを確認。
    $this->assertEquals($result->id, $targetYardGroup->id);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($targetYardGroup);
});
