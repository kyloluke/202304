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
        'regionId' => '文字列は 許さないタイプです',
    ]
];

// 自分と重複の場合　チェックデータ
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '', // 自分を除いて、重複をチェック
        'regionId' => 100000, // ターゲット地域存在するかチェック
    ]
];
// ほかの件と重複の場合　チェックデータ
$data4 = [
    'type' => 4,
    'data' => [
        'name' => ''
    ]
];


it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];
    switch ($type) {
        case 1:
        case 2:
            $country = Country::factory()->create();
            $res = $this->json('put', 'api/lp3-core/country/' . $country->id, $reqData);
            $res->assertJsonValidationErrors(['name', 'regionId']);
            break;
        case 3:
            // 国を新規作成しておく、名称の重複をチェックする
            $country = Country::factory()->create();
            $reqData['name'] = $country->name; // 重複させる
            $res = $this->json('put', 'api/lp3-core/country/' . $country->id, $reqData);
            $res->assertJsonValidationErrors(['regionId']);
        case 4:
            $data1 = [
                'name' => '国A'
            ];

            $data2 = [
                'name' => '国B'

            ];
            $country1 = Country::factory()->create($data1);
            $country2 = Country::factory()->create($data2);
            // 更新ターゲットは　country2
            $reqData['name'] = $country1->name;
            $res = $this->json('put', 'api/lp3-core/country/' . $country2->id, $reqData);
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
    $region = Region::factory()->create();
    $reqData = [
        'name' => '名称を更新しました',
        'regionId' => $region->id,
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/country/100000', $reqData);
    $result->assertNotFound();
});

// 国を更新する
it('updates a country', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();
    $region = Region::factory()->create();
    $reqData = [
        'name' => '国が更新されました',
        'regionId' => $region->id
    ];
    // api call
    $result = $this->json('put', 'api/lp3-core/country/' . $country->id, $reqData);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 登録されたデータが正しいか確認
    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['name'], $reqData['name']);
    $this->assertEquals($resData['regionId'], $reqData['regionId']);
});

