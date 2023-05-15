<?php

use Services\Lp3Core\App\Models\Organization;
use Tests\TestCase;

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-core/organization');

    // データがないことを確認
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('gets all organizations', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Organization::factory()->count(10)->create();

    // api call
    $result = $this->json('get', 'api/lp3-core/organization');

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();

    // 返却されたデータの数が10であることを確認
    $result->assertJsonCount(10, 'data');
});

it('searches organizations', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Organization::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => ["test", "テスト"],
        'systemUsage' => 1,
    ];

    // api call
    $result = $this->get(route('organization.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});

it('searches organizations all params are empty', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Organization::factory()->create();

    // 検索条件を設定
    $queryParameterArray = [
        'nameKeyWords' => "",
        'systemUsage' => "",
    ];

    // api call
    $result = $this->get(route('organization.index', $queryParameterArray));

    // レスポンスが正常に返ってきていることを確認
    $result->assertOk();
});
