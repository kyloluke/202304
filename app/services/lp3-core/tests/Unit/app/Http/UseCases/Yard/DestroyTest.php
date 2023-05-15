<?php

use Services\Lp3Core\App\Http\UseCases\Yard\Destroy;
use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('deletes a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYard = Yard::factory()->create();

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($targetYard->id);

    // 削除したデータが指定したデータと一致していることを確認。
    $this->assertEquals($result->id, $targetYard->id);
    $this->assertEquals($result->name_jp, $targetYard->name_jp);
    $this->assertEquals($result->name_en, $targetYard->name_en);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($targetYard);
});
