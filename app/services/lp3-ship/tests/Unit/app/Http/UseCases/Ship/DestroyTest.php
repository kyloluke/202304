<?php

use Services\Lp3Ship\App\Http\UseCases\Ship\Destroy;
use Services\Lp3Ship\App\Models\Ship;
use Tests\TestCase;

it('deletes a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetShip = Ship::factory()->create();

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($targetShip->id);

    // 削除した本船情報が指定した本船情報と一致していることを確認。
    $this->assertEquals($result->name, $targetShip->name);
    $this->assertEquals($result->name_en, $targetShip->name_en);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($targetShip);
});
