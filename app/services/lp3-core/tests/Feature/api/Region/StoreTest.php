<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Region;
use Illuminate\Support\Str;

// 必須チェック チェックデータ
$data1 = [
    'type' => 1,
    "data" => [
        'name' => '',
    ]
];

// 長さとタイプ　チェックデータ
$data2 = [
    'type' => 2,
    'data' => [
        'name' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
    ]
];

// 重複と有効　チェックデータ
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '', // 重複をチェック
    ]
];


it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
        case 2:
            $res = $this->json('post', 'api/lp3-core/region', $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 3:
            // 国を新規作成しておく、名称の重複をチェックする
            $region = Region::factory()->create();
            $reqData['name'] = $region->name; // 重複させる
            $res = $this->json('post', 'api/lp3-core/region', $reqData);
            $res->assertJsonValidationErrors(['name']);
        default:
    }

})->with([
    [$data1],
    [$data2],
    [$data3]
]);

it('creates a region', function () {
    /** @var TestCase $this */
    // 登録データ作成
    $reqData = [
        'name' => 'Africa',
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/region', $reqData);
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['name'], $reqData['name']);
});
