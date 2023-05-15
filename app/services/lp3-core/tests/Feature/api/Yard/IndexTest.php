<?php

use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Models\Yard;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/yard');

    // データがないことを確認
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('gets all yards', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Yard::factory()->count(15)->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/yard');

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 返却されたデータの数が10であることを確認
    $result->assertJsonCount(15, 'data');
});

it('searches yards', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yards = Yard::factory()->count(15)->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => [$yards[0]->name_jp],
        'yardStatus' => YardStatus::ENABLE->value,
        'capacities' => [$yards[0]->capacity],
    ];

    // api call
    $result = $this->get(route('yard.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});

it('searches yard groups all params are empty', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Yard::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => "",
        'yardStatus' => "",
        'capacities' => "",
    ];

    // api call
    $result = $this->get(route('yard.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});

it('searches yard groups array params have empty value', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Yard::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => [""],
        'yardStatus' => "",
        'capacities' => [""],
    ];

    // api call
    $result = $this->get(route('yard.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});
