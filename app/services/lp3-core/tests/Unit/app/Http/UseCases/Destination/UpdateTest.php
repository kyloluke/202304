<?php

use Services\Lp3Core\App\Http\UseCases\Destination\Update;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Destination;
use Tests\TestCase;
use Illuminate\Support\Arr;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Core\App\Enums\LocationType;

it('update a destination', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();
    // テストデータ作成
    $data = [
        'name' => "名称が更新しました、＄％％＆”＃",
        'nameEn' => "english name",
        'countryId' => $country->id,
        'zipCode' => '122 2222',
        'stateJp' => '愛知県',
        'stateEn' => 'aichiken',
        'cityJp' => '名古屋',
        'cityEn' => 'nagoya',
        'address1Jp' => 'アドレス1',
        'address1En' => 'address1',
        'address2Jp' => 'アドレス2',
        'address2En' => 'address2',
        'address3Jp' => 'アドレス3',
        'address3En' => 'address3',
        'unloCode' => 'test unlo code',
        'requireLocalAgent' => true,
        'naccsCode' => 'test naccs code',
        'timezone' => Arr::random(array_column(TimeZone::cases(), 'value'))
    ];

    $destination = Destination::factory()->create();
    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($destination->id, $data);

    $resData = Arr::except($result->toArray(), ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at', 'country', 'location_type', 'type']);
    // 変更後の内容とテストデータが一致していることを確認
    $tempData = [];
    foreach ($data as $key => $val) {
        $tempData[Str::snake($key)] = $val;
    }
    $this->assertEquals($tempData, $resData);
});
