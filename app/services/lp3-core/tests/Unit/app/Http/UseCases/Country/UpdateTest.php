<?php

use Services\Lp3Core\App\Http\UseCases\Country\Update;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('update a country', function () {
    /** @var TestCase $this */

    $region = Region::factory()->create();
    // テストデータ作成
    $data = [
        'name' => "名称が更新しました、＄％％＆”＃",
        'regionId' => $region->id
    ];
    $country = Country::factory()->create();

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($country->id, $data);

    // 変更後の内容とテストデータが一致していることを確認
    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->region_id, $data['regionId']);
});
