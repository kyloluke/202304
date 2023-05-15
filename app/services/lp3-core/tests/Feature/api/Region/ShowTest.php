<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Region;

it('no data', function () {
    /** @var TestCase $this */
    $result = $this->json('get', 'api/lp3-core/region/10000');
    $result->assertNotFound();
});

it('gets a region by id', function () {
    /** @var TestCase $this */
    $reqData = [
        'name' => '地域名称 テスト＄＃A&',
    ];
    $region = Region::factory()->create($reqData);

    // api call
    $result = $this->json('get', 'api/lp3-core/region/' . $region->id);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $region->name);
});
