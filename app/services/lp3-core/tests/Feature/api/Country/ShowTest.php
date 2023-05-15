<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Region;

it('no data', function () {
    /** @var TestCase $this */
    $result = $this->json('get', 'api/lp3-core/country/10000');
    $result->assertNotFound();
});

it('gets a country by id', function () {
    /** @var TestCase $this */
    $region = Region::factory()->create();
    $reqData = [
        'name' => '名称',
        'region_id' => $region->id,
    ];
    $country = Country::factory()->create($reqData);

    // api call
    $result = $this->json('get', 'api/lp3-core/country/' . $country->id);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $country->name);
    $this->assertEquals($resData['regionId'], $region->id);
});
