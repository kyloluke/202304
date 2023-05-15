<?php

use Tests\TestCase;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Ship\Refers\Models\Country;
use Services\Lp3Ship\App\Models\ShipCompany;
use Illuminate\Support\Arr;

// 必須チェック データ
// [name] err
$data1 = [
    'type' => 1,
    "data" => [
        'name' => '',
        'scacCode' => '',
        'mail' => '',
        'remark' => '',
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
        'timezone' => ''
    ]
];

// 長さチェック　データ
$data2 = [
    'type' => 2,
    'data' => [
        'name' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'scacCode' => '50文字超えました、50文字超えました、50文字超えました、50文字超えました、50文字超えましたよ、',
        'mail' => 'LP2は文字数が最大500になっている、',
        'remarks' => 'LP2は文字数が最大10000になっている',
        'countryId' => 1111,
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

// タイプ チェック　データ
//[mail, countryId] err
$data3 = [
    'type' => 3,
    'data' => [
        'name' => 123456,
        'scacCode' => 123456,
        'mail' => 'this is not a Mail format',
        'remarks' => '',
        'countryId' => 'this is not Int',
        'zipCode' => '#$#%',
        'stateJp' => 'tokyo, this is correct answer',
        'stateEn' => 'tokyo, this is correct answer',
        'cityJp' => 'tokyo, this is correct answer',
        'cityEn' => 'tokyo, this is correct answer',
        'address1Jp' => 123456,
        'address1En' => 123456,
        'address2Jp' => 123456,
        'address2En' => 123456,
        'address3Jp' => 123456,
        'address3En' => 123456,
        'timezone' => 'this is not Numeric',
    ]
];

$data4 = [
    'type' => 4,
    'data' => [
        'name' => '',  // 重複のチェック
        'countryId' => 0, // 国存在するかチェック
        'mail' => 'this is not mail address', // メールアドレス形のチェック
        'timezone' => 0 // タイムゾーンが存在するか確認する
    ]
];

it('validation will be failed', function ($data) {
    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
            $res = $this->json('post', 'api/lp3-ship/ship-company', $reqData);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 2:
            $res = $this->json('post', 'api/lp3-ship/ship-company', $reqData);
            $res->assertJsonValidationErrors(['name', 'scacCode', 'zipCode', 'stateJp', 'stateEn', 'cityJp', 'cityEn', 'address1Jp', 'address1En', 'address2Jp', 'address2En', 'address3Jp', 'address3En']);
            break;
        case 3:
            $res = $this->json('post', 'api/lp3-ship/ship-company', $reqData);
            $res->assertJsonValidationErrors(['mail', 'countryId']);
            break;
        case 4:
            // 船会社を新規作成しておく、名称の重複をチェックする
            $shipCompany = ShipCompany::factory()->create();
            $reqData['name'] = $shipCompany->name; // 重複させる
            $res = $this->json('post', 'api/lp3-ship/ship-company', $reqData);
            $res->assertJsonValidationErrors(['name', 'countryId', 'mail', 'timezone']);
        default:

    }

})->with([
    [$data1],
    [$data2],
    [$data3],
    [$data4]
]);

it('creates a ship-company', function () {
    /** @var TestCase $this */

    // country_id
    $country = Country::factory()->create();
    // timezone
    $timezone = Arr::random((array_column(TimeZone::cases(), 'value')));
    // 登録データ作成
    $data = [
        'name' => 'ASIA MARINE AGENCY, LTD.',
        'scacCode' => '123456',
        'mail' => 'example@funa-company.com',
        'remarks' => 'this can be nullable',
        'countryId' => $country->id,
        'zipCode' => '#$#%',
        'stateJp' => 'tokyo, this is correct answer',
        'stateEn' => 'tokyo, this is correct answer',
        'cityJp' => 'tokyo, this is correct answer',
        'cityEn' => 'tokyo, this is correct answer',
        'address1Jp' => '123456_string',
        'address1En' => '123456_string',
        'address2Jp' => '123456_string',
        'address2En' => '123456_string',
        'address3En' => '123456_string',
        'address3Jp' => '123456_string',
        'timezone' => $timezone,
    ];

    // api call
    $result = $this->json('post', 'api/lp3-ship/ship-company', $data);

    // レスポンスが正常に返ってくることを確認
    $result->assertCreated();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];
    $resultData = Arr::except($resultData, ['id', 'createdBy', 'updatedBy', 'deletedBy', 'createdAt', 'updatedAt', 'deletedAt', 'country']);
    $this->assertEquals($resultData, $data);
});
