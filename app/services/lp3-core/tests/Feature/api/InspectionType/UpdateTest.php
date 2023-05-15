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

// 自分と重複の場合 チェックデータ
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '',
    ]
];

// ほかのデータと重複の場合 チェックデータ
$data4 = [
    'type' => 4,
    'data' => [
        'name' => '',
    ]
];


it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
        case 2:
            $inspectionType = InspectionType::factory()->create();
            $res = $this->json('put', 'api/lp3-core/inspection-type/' . $inspectionType->id, $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 3:
            // 検査種別を新規作成しておく、名称の重複をチェックする
            $inspectionType = InspectionType::factory()->create();
            $reqData['name'] = $inspectionType->name; // 自分を重複させる、エラー出ないこと
            $res = $this->json('put', 'api/lp3-core/inspection-type/' . $inspectionType->id, $reqData);
            $res->assertOk();
        case 4:
            $data1 = [
                'name' => '検査タイプA',
            ];

            $data2 = [
                'name' => '検査タイプB',
            ];
            $inspectionType1 = InspectionType::factory()->create($data1);
            $inspectionType2 = InspectionType::factory()->create($data2);
            $reqData['name'] = $inspectionType1->name;
            $res = $this->json('put', 'api/lp3-core/inspection-type/' . $inspectionType2->id, $reqData);
            $res->assertJsonValidationErrors(['name']);
    }

})->with([
    [$data1],
    [$data2],
    [$data3],
    [$data4]
]);

// resource not be found
it('no data', function () {
    /** @var TestCase $this */
    $reqData = [
        'name' => '名称を更新しました',
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/inspection-type/100000', $reqData);
    $result->assertNotFound();
});

// 国を更新する
it('updates a inspection-type', function () {
    /** @var TestCase $this */

    $inspectionType = InspectionType::factory()->create();
    $reqData = [
        'name' => '検索種別　が更新されました＃＄＃',
    ];
    // api call
    $result = $this->json('put', 'api/lp3-core/inspection-type/' . $inspectionType->id, $reqData);

    $result->assertOk();
    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $reqData['name']);
});

