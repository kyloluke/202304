<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Enums\LocationType;

it('no data', function () {
    /** @var TestCase $this */
    $result = $this->json('get', 'api/lp3-core/destination/10000');
    $result->assertNotFound();
});

it('gets a destination by id', function () {
    /** @var TestCase $this */
    $country = Country::factory()->create();
    $reqData = [
        'name' => '名称',
        'country_id' => $country->id,
    ];
    $destination = Destination::factory()->create($reqData);

    // api call
    $result = $this->json('get', 'api/lp3-core/destination/' . $destination->id);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $destination->name);
    $this->assertEquals($resData['countryId'], $destination->country_id);
    $this->assertEquals($resData['locationType'], LocationType::DESTINATION->value);
});
