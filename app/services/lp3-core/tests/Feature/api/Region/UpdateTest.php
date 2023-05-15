<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Region;

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

// 時分と重複の場合　チェックデータ
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '',
    ]
];

// ほかのデータと重複の場合　チェックデータ
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
            $region = Region::factory()->create();
            $res = $this->json('put', 'api/lp3-core/region/' . $region->id, $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 3:
            $region = Region::factory()->create();
            $reqData['name'] = $region->name; // 重複させる、エラー出ないこと
            $res = $this->json('put', 'api/lp3-core/region/' . $region->id, $reqData);
            $res->assertOk();
        case 4:
            $data1 = [
                'name' => '地域　A',
            ];

            $data2 = [
                'name' => '地域　B',
            ];
            $region1 = Region::factory()->create($data1);
            $region2 = Region::factory()->create($data2);
            $reqData['name'] = $region1->name; // 重複させる、エラー出ること
            $res = $this->json('put', 'api/lp3-core/region/' . $region2->id, $reqData);
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
        'name' => '地域名称を更新しました',
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/region/100000', $reqData);
    $result->assertNotFound();
});

// 地域を更新する
it('updates a region', function () {
    /** @var TestCase $this */

    $region = Region::factory()->create();
    $reqData = [
        'name' => '地域が更新されました!!##"$',
    ];
    // api call
    $result = $this->json('put', 'api/lp3-core/region/' . $region->id, $reqData);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['name'], $reqData['name']);
});

