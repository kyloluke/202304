<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Index;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('gets all ships', function () {
    /** @var TestCase $this */

    // テストデータ作成
    YardGroup::factory(10)->create();

    // ユースケース呼び出し
    $useCase = new Index();
    $queryParameterArray = []; // $useCaseの引数として必要なため定義
    $result = $useCase($queryParameterArray);

    // 取得件数が10件であることを確認
    $this->assertEquals(count($result->items()), 10);
});

it('searches ships by name and type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $port = Port::factory()->create();
    $yardGroup = YardGroup::factory()->hasAttached(
        OfficeBusinessTypes::factory(['business_type' => BusinessType::CUSTOM_BROKER])
    )->create(["default_pol_id" => $port->id]);
    $yard = Yard::factory()->create([
        'capacity' => 100,
        'yard_group_id' => $yardGroup->id
    ]);


    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => [$yardGroup->name],
        'yardStatus' => 1,
        'capacities' => [$yard->capacity],
        'mailKeyWords' => ["test"],
        'defaultPolId' => $yardGroup->defaultPol->id,
        'defaultCustomBrokerOfficeId' => $yardGroup->officeBusinessTypes[0]->office_id,
    ];

    // ユースケース呼び出し
    $useCase = new Index();
    $result = $useCase($queryParameterArray);

    // 取得できていることを確認
    $this->assertEquals(count($result->items()), 1);
});
