<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Enums\PortType;
use Illuminate\Support\Arr;

// 必須チェック チェックデータ
$data1 = [
    'type' => 1,
    "data" => [
        'name' => '',
        'nameEn' => '',
        'type' => '',
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
        'nameEn' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'type' => 33333,
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
        'type' => Arr::random(array_column(PortType::cases(), 'value')),
    ]
];


it('validation well be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
            $res = $this->json('post', 'api/lp3-core/port', $reqData);
            $res->assertJsonValidationErrors(['name', 'type']);
            break;
        case 2:
            $res = $this->json('post', 'api/lp3-core/port', $reqData);
            $res->assertJsonValidationErrors([
                'name', 'nameEn', 'countryId', 'zipCode', 'stateJp', 'stateEn', 'cityJp', 'cityEn', 'timezone',
                'address1Jp', 'address1En', 'address2Jp', 'address2En', 'address3Jp', 'address3En', 'type', 'requireLocalAgent'
            ]);
            break;
        case 3:
            $port = Port::factory()->create();
            $reqData['name'] = $port->name; // 重複させる、エラー出る
            $res = $this->json('post', 'api/lp3-core/port', $reqData);
            $res->assertJsonValidationErrors(['name', 'countryId']);

    }
})->with([
    [$data1],
    [$data2],
    [$data3]
]);

it('creates a port', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $country = Country::factory()->create();
    $reqData = [
        'name' => 'オーストラリア',
        'countryId' => $country->id,
        'type' => PortType::POL->value
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/port', $reqData);
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resultData['name'], $reqData['name']);
    $this->assertEquals($resultData['countryId'], $reqData['countryId']);
    $this->assertEquals($resultData['type'], $reqData['type']);
});
