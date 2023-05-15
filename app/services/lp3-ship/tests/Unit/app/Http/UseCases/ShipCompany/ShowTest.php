<?php

use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Show;
use Services\Lp3Ship\App\Models\ShipCompany;
use Tests\TestCase;

it('gets a ship', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipCompany = ShipCompany::factory()->create();

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($shipCompany->id);

    $resArr = Arr::except($result->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id', 'country']);
    $tempArr = Arr::except($shipCompany->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id']);
    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($tempArr, $resArr);
});
