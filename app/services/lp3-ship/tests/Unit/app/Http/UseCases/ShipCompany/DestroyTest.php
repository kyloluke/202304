<?php

use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Destroy;
use Services\Lp3Ship\App\Models\ShipCompany;
use Tests\TestCase;

it('deletes a ship-company', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $shipCompany = ShipCompany::factory()->create();

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($shipCompany->id);

    // 削除した本船情報が指定した本船情報と一致していることを確認。
    $resArr = Arr::except($result->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id']);
    $tempArr = Arr::except($shipCompany->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id']);
    $this->assertEquals($tempArr, $resArr);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($shipCompany);
});
