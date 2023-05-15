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
        'timezone' => '',
        'requireLocalAgent' => ''
    ]
];

// 長さとタイプ　チェック
$data2 = [
    'type' => 2,
    'data' => [
        'name' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
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
        'requireLocalAgent' => 'not boolean'
    ]
];
// 名称ユニークチェック と　国ID有効性のチェック
$data3 = [
    'type' => 3,
    'data' => [
        'name' => '', // 重複をチェック
        'countryId' => 100000, // ターゲット地域存在するかチェック
    ]
];

it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
            $res = $this->json('post', 'api/lp3-core/destination', $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 2:
            $res = $this->json('post', 'api/lp3-core/destination', $reqData);
            $res->assertJsonValidationErrors([
                'name', 'countryId', 'zipCode', 'stateJp', 'stateEn', 'cityJp', 'cityEn', 'timezone',
                'address1Jp', 'address1En', 'address2Jp', 'address2En', 'address3Jp', 'address3En', 'requireLocalAgent'
            ]);
            break;
        case 3:
            $destination = Destination::factory()->create();
            $reqData['name'] = $destination->name; // 重複させる、エラー出る
            $res = $this->json('post', 'api/lp3-core/destination', $reqData);
            $res->assertJsonValidationErrors(['name', 'countryId']);

            break;
        default:
    }
})->with([
    [$data1],
    [$data2],
    [$data3]

]);

it('creates a destination', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $country = Country::factory()->create();
    $reqData = [
        'name' => 'オーストラリア',
        'countryId' => $country->id,
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/destination', $reqData);
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resultData['name'], $reqData['name']);
    $this->assertEquals($resultData['countryId'], $reqData['countryId']);
    $this->assertEquals($resultData['locationType'], LocationType::DESTINATION->value);
});
