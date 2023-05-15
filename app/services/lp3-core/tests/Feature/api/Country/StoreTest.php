<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Region;

// 必須チェック チェックデータ
$data1 = [
    'type' => 1,
    "data" => [
        'name' => '',
        'regionId' => '',
    ]
];

// 長さとタイプ　チェックデータ
$data2 = [
    'type' => 2,
    'data' => [
        'name' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'regionId' => '文字列は許さないタイプです',
    ]
];

// 重複と有効　チェックデータ
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '', // 重複をチェック
        'regionId' => 100000, // ターゲット地域存在するかチェック
    ]
];

it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
        case 2:
            $res = $this->json('post', 'api/lp3-core/country', $reqData);
            $res->assertJsonValidationErrors(['name', 'regionId']);
            break;
        case 3:
            // 国を新規作成しておく、名称の重複をチェックする
            $country = Country::factory()->create();
            $reqData['name'] = $country->name; // 重複させる
            $res = $this->json('post', 'api/lp3-core/country', $reqData);
            $res->assertJsonValidationErrors(['name', 'regionId']);
    }

})->with([
    [$data1],
    [$data2],
    [$data3]
]);

it('creates a country', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $region = Region::factory()->create();
    $reqData = [
        'name' => 'オーストラリア',
        'regionId' => $region->id,
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/country', $reqData);
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resultData['name'], $reqData['name']);
    $this->assertEquals($resultData['regionId'], $reqData['regionId']);
});
