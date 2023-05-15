<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Enums\PortType;
use Illuminate\Support\Arr;

it('no data', function () {
    /** @var TestCase $this */
    $result = $this->json('get', 'api/lp3-core/port/10000');
    $result->assertNotFound();
});

it('gets a port by id', function () {
    /** @var TestCase $this */
    $country = Country::factory()->create();
    $reqData = [
        'name' => '名称',
        'country_id' => $country->id,
        'type' => Arr::random(array_column(PortType::cases(), 'value'))
    ];
    $port = Port::factory()->create($reqData);

    // api call
    $result = $this->json('get', 'api/lp3-core/port/' . $port->id);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $port->name);
    $this->assertEquals($resData['type'], $port->type);
    $this->assertEquals($resData['countryId'], $port->country_id);
    $this->assertEquals($resData['locationType'], $port->location_type);
});
