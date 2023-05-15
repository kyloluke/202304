<?php

use Services\Lp3Core\App\Http\UseCases\Port\Store;
use Services\Lp3Core\App\Models\Country;
use Tests\TestCase;
use Services\Lp3Core\App\Enums\TimeZone;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Services\Lp3Core\App\Enums\PortType;

it('creates a destination-location', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();
    $data = [
        'name' => 'テスト仕向け地 #66',
        'type' => Arr::random(array_column(PortType::cases(), 'value')),
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
        'naccsCode' => 'test naccs code',
        'timezone' => Arr::random(array_column(TimeZone::cases(), 'value'))
    ];

    $useCase = new Store();
    $resData = $useCase($data)->toArray();

    $resData = Arr::except($resData, ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at', 'country', 'location_type']);

    $tempData = [];
    foreach ($data as $k => $v) {
        $tempData[Str::snake($k)] = $v;
    }
    $this->assertEquals($tempData, $resData);
});
