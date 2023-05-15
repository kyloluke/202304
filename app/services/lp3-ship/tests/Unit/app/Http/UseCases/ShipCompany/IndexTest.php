<?php

use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Index;
use Services\Lp3Ship\App\Models\ShipCompany;
use Tests\TestCase;

it('gets all ship-companies', function () {
    /** @var TestCase $this */

    $shipCompany_1 = ShipCompany::factory()->create();
    $shipCompany_2 = ShipCompany::factory()->create();

    // ユースケース呼び出し
    $data = [];
    $useCase = new Index();
    $result = $useCase($data);

    // 取得件数が2件であることを確認
    $this->assertEquals($result->count(), 2);

    // 取得内容と作成したテストデータが一致していることを確認
    $resArr1 = Arr::except($result[0]->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id', 'country']); //　relation except
    $tempArr1 = Arr::except($shipCompany_1->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id']);
    $resArr2 = Arr::except($result[1]->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id', 'country']); //　relation except
    $tempArr2 = Arr::except($shipCompany_2->toArray(), ['deleted_by', 'deleted_at', 'updated_by', 'created_by', 'updated_at', 'created_at', 'id']);

    $this->assertEquals($resArr1, $tempArr1);
    $this->assertEquals($resArr2, $tempArr2);
});
