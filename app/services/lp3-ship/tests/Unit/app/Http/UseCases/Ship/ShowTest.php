<?php

use Services\Lp3Ship\App\Http\UseCases\Ship\Show;
use Services\Lp3Ship\App\Models\Ship;
use Tests\TestCase;

it('gets a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetShip = Ship::factory()->create();

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($targetShip->id);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result->name, $targetShip->name);
    $this->assertEquals($result->type, $targetShip->type);
});
