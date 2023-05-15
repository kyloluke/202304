<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Models\Destination;

// 必須チェック チェックデータ
$data1 = [
    'type' => 1,
    "data" => [
        'name' => '',
        'requireLocalAgent' => '',
        'countryId' => '',
        'zipCode' => '',
        'stateJp' => '',
        'stateEn' => '',
        'cityJp' => '',
        'cityEn' => '',
        'address1Jp' => '',
        'address1En' => '',
        'address2Jp' => '',
        'address2En' => '',
        'address3Jp' => '',
        'address3En' => '',
        'unloCode' => '',
        'naccsCode' => '',
        'timezone' => ''
    ]
];

// 長さとタイプ　チェックデータ
$data2 = [
    'type' => 2,
    'data' => [
        'name' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'requireLocalAgent' => 'not boolean',
        'countryId' => '文字列は許さないタイプです',
        'zipCode' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'stateJp' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'stateEn' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'cityJp' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'cityEn' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'address1Jp' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'address1En' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'address2Jp' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'address2En' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'address3Jp' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'address3En' => '120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えた、、120文字超えたよ、、',
        'timezone' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
    ]
];

// 自分と重複 と国の有効性　チェック
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '', // 自分を除いて、重複をチェック
        'countryId' => 100000, // ターゲット地域存在するかチェック
    ]
];
// ほかの件と重複の場合　チェックデータ
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
            $destination = Destination::factory()->create();
            $res = $this->json('put', 'api/lp3-core/destination/' . $destination->id, $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 2:
            $destination = Destination::factory()->create();
            $res = $this->json('put', 'api/lp3-core/destination/' . $destination->id, $reqData);
            $res->assertJsonValidationErrors([
                'name', 'countryId', 'zipCode', 'stateJp', 'stateEn', 'cityJp', 'cityEn', 'timezone',
                'address1Jp', 'address1En', 'address2Jp', 'address2En', 'address3Jp', 'address3En', 'requireLocalAgent'
            ]);
            break;
        case 3:
            $destination = Destination::factory()->create();
            $reqData['name'] = $destination->name; // 自分を重複させる、エラーないこと
            $res = $this->json('put', 'api/lp3-core/destination/' . $destination->id, $reqData);
            $res->assertJsonValidationErrors(['countryId']);
        case 4:
            $data1 = [
                'name' => '仕向地A'
            ];

            $data2 = [
                'name' => '仕向地B'
            ];
            $destination1 = Destination::factory()->create($data1);
            $destination2 = Destination::factory()->create($data2);
            // 更新ターゲットは　$destination2
            $reqData['name'] = $destination1->name;
            $res = $this->json('put', 'api/lp3-core/destination/' . $destination2->id, $reqData);
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
    $country = Country::factory()->create();
    $reqData = [
        'name' => '名称を更新しました',
        'countryId' => $country->id,
        'locationType' => LocationType::DESTINATION->value
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/destination/100000', $reqData);
    $result->assertNotFound();
});

// 仕向地を更新する
it('updates a destination', function () {
    /** @var TestCase $this */

    $destination = Destination::factory()->create();
    $country = Country::factory()->create();
    $reqData = [
        'name' => '名称が更新されました',
        'countryId' => $country->id,
    ];
    // api call
    $result = $this->json('put', 'api/lp3-core/destination/' . $destination->id, $reqData);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 登録されたデータが正しいか確認
    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['name'], $reqData['name']);
    $this->assertEquals($resData['countryId'], $reqData['countryId']);
    $this->assertEquals($resData['locationType'], LocationType::DESTINATION->value);
});

