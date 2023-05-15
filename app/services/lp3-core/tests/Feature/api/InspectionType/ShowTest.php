<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\InspectionType;

it('no data', function () {
    /** @var TestCase $this */
    $result = $this->json('get', 'api/lp3-core/inspection-type/10000');
    $result->assertNotFound();
});

it('gets a inspection-type by id', function () {
    /** @var TestCase $this */

    $reqData = ['name' => '名称'];
    $inspectionType = InspectionType::factory()->create($reqData);

    // api call
    $result = $this->json('get', 'api/lp3-core/inspection-type/' . $inspectionType->id);
    $result->assertOk();

    $resData = json_decode($result->content(), true)['data'];
    $this->assertEquals($resData['name'], $inspectionType->name);
});
