<?php

use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Update;
use Services\Lp3Ship\App\Models\ShipCompany;
use Tests\TestCase;

it('update a ship-company', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $data = [
        'name' => "名称が更新しました、＄％％＆”＃",
        'remarks' => "備考が更新しました、＄％％＆”＃",
    ];

    $shipCompany = ShipCompany::factory()->create();

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($shipCompany->id, $data);

    // 変更後の内容とテストデータが一致していることを確認
    $this->assertEquals($result->id, $shipCompany->id);
    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->remarks, $data['remarks']);
});
