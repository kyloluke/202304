<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Ship\Refers\Models\Country;
use Illuminate\Support\Arr;

// 必須チェック データ
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
        'timezone' => '',
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
        'name' => '', // 自分を除いて、名称の重複をチェック
        'countryId' => 7777, // 国存在するかチェック
        'mail' => 'this is not mail address', // メールアドレス形のチェック
        'timezone' => 7777 // タイムゾーンが存在するか確認する
    ]
];

it('validation will be failed', function ($data) {

    switch ($data['type']) {
        case 1:
            $shipCompany = ShipCompany::factory()->create();
            $res = $this->json('put', 'api/lp3-ship/ship-company/' . $shipCompany->id, $data['data']);
            $res->assertJsonValidationErrors(['name']);
            break;
        case 2:
            $shipCompany = ShipCompany::factory()->create();
            $res = $this->json('put', 'api/lp3-ship/ship-company/' . $shipCompany->id, $data['data']);
            $res->assertJsonValidationErrors(['name', 'scacCode', 'zipCode', 'stateJp', 'stateEn', 'cityJp', 'cityEn', 'address1Jp', 'address1En', 'address2Jp', 'address2En', 'address3Jp', 'address3En']);
            break;
        case 3:
            $shipCompany = ShipCompany::factory()->create();
            $res = $this->json('put', 'api/lp3-ship/ship-company/' . $shipCompany->id, $data['data']);
            $res->assertJsonValidationErrors(['mail', 'countryId']);
            break;
        case 4:
            // 船会社を新規作成しておく、名称の重複をチェックする
            $shipCompany = ShipCompany::factory()->create();
            $data['name'] = $shipCompany->name; // 重複させる
            $res = $this->json('put', 'api/lp3-ship/ship-company/' . $shipCompany->id, $data['data']);
            $res->assertJsonValidationErrors(['name', 'countryId', 'mail', 'timezone']);
        default:
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
    // 更新内容作成
    $dataForUpdating = [
        'name' => '名称を更新しました',
        'scacCode' => '船会社コードを更新しました',
        'mail' => 'example@example.com',
        'remarks' => 'remarks　更新しました',
        'countryId' => $country->id, // 国の存在のチェックは　↑$data4でチェック完了
        'zipCode' => 'zipCode を更新しました',
        'stateJp' => 'stateJp を更新しました',
        'stateEn' => 'stateEn を更新しました',
        'cityJp' => 'cityJp を更新しました',
        'cityEn' => 'cityEn を更新しました',
        'address1Jp' => 'address1Jp を更新しました',
        'address1En' => 'address1En を更新しました',
        'address2Jp' => 'address2Jp を更新しました',
        'address2En' => 'address2En を更新しました',
        'address3Jp' => 'address3Jp を更新しました',
        'address3En' => 'address3En を更新しました',
        'timezone' => Arr::random(array_column(TimeZone::cases(), "value")),
    ];

    // api call
    $result = $this->json('put', 'api/lp3-ship/ship-company/100000', $dataForUpdating);

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});

// 船会社を更新する
it('updates a ship-company', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();

    // 更新データ作成
    $reqData = [
        'name' => '名称を更新しました',
        'scacCode' => '船会社コードを更新しました',
        'mail' => 'example@example.com',
        'remarks' => 'remarks　更新しました',
        'countryId' => $country->id, // 国の存在のチェックは　↑$data4でチェック完了
        'zipCode' => 'zipCode を更新しました',
        'stateJp' => 'stateJp を更新しました',
        'stateEn' => 'stateEn を更新しました',
        'cityJp' => 'cityJp を更新しました',
        'cityEn' => 'cityEn を更新しました',
        'address1Jp' => 'address1Jp を更新しました',
        'address1En' => 'address1En を更新しました',
        'address2Jp' => 'address2Jp を更新しました',
        'address2En' => 'address2En を更新しました',
        'address3Jp' => 'address3Jp を更新しました',
        'address3En' => 'address3En を更新しました',
        'timezone' => Arr::random(array_column(TimeZone::cases(), "value")),
    ];

    $shipCompany = ShipCompany::factory()->create();

    // api call
    $result = $this->json('put', 'api/lp3-ship/ship-company/' . $shipCompany->id, $reqData);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];
    $resData = Arr::except($resultData, ['id', 'createdBy', 'createdAt', 'updatedBy', 'updatedAt', 'deletedBy', 'deletedAt', 'country']);

    $this->assertEquals($resData, $reqData);

});

