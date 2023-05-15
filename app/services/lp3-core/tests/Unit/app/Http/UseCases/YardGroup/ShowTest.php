<?php

use Services\Lp3Core\App\Http\UseCases\YardGroup\Show;
use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('gets a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create();

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($targetYardGroup->id);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result->id, $targetYardGroup->id);
});
