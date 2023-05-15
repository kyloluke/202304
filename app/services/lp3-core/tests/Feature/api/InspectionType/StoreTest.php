<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\InspectionType;

// 必須   チェックデータ
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

// 重複 チェックデータ
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
            $res = $this->json('post', 'api/lp3-core/inspection-type', $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 3:
            // 検査種別を新規作成しておく、名称の重複をチェックする
            $inspectionType = InspectionType::factory()->create();
            $reqData['name'] = $inspectionType->name; // 重複させる

            $res = $this->json('post', 'api/lp3-core/inspection-type', $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        default:
    }

})->with([
    [$data1],
    [$data2],
    [$data3]
]);

it('store a inspection-type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $reqData = [
        'name' => '検索種別　作成テスト',
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/inspection-type', $reqData);
    $result->assertCreated();
    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $reqData['name']);
});
