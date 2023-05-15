<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/yard-group');

    // データがないことを確認
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('gets all yard groups', function () {
    /** @var TestCase $this */

    // テストデータ作成
    YardGroup::factory()->count(10)->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/yard-group');

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 返却されたデータの数が10であることを確認
    $result->assertJsonCount(10, 'data');
});

it('searches yard groups', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yardGroup = YardGroup::factory()->hasAttached(
        OfficeBusinessTypes::factory(['business_type' => BusinessType::CUSTOM_BROKER])
    )->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => ["test", "テスト"],
        'yardStatus' => 1,
        'capacities' => [100, 200],
        'mailKeyWords' => ["mail", "com"],
        'defaultPolId' => 10,
        'defaultCustomBrokerOfficeId' => $yardGroup->officeBusinessTypes[0]->office_id,
    ];

    // api call
    $result = $this->get(route('yard-group.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});

it('searches yard groups all params are empty', function () {
    /** @var TestCase $this */

    // テストデータ作成
    YardGroup::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => "",
        'yardStatus' => "",
        'capacities' => "",
        'mailKeyWords' => "",
        'defaultPolId' => "",
        'defaultCustomBrokerOfficeId' => "",
    ];

    // api call
    $result = $this->get(route('yard-group.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});

it('searches yard groups array params have empty value', function () {
    /** @var TestCase $this */

    // テストデータ作成
    YardGroup::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => [""],
        'yardStatus' => "",
        'capacities' => [""],
        'mailKeyWords' => [""],
        'defaultPolId' => "",
        'defaultCustomBrokerOfficeId' => "",
    ];

    // api call
    $result = $this->get(route('yard-group.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});
