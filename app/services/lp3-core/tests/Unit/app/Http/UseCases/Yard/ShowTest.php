<?php

use Services\Lp3Core\App\Http\UseCases\Yard\Show;
use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('gets a yard', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYard = Yard::factory()->create();

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($targetYard->id);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result->id, $targetYard->id);
    $this->assertEquals($result->name_jp, $targetYard->name_jp);
    $this->assertEquals($result->name_en, $targetYard->name_en);
});
