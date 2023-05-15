<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\InspectionType;

it('deletes a inspection-type', function () {
    /** @var TestCase $this */

    $inspectionType = InspectionType::factory()->create();
    $result = $this->json('delete', 'api/lp3-core/inspection-type/' . $inspectionType->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-core/inspection-type/' . $inspectionType->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    $result = $this->json('delete', 'api/lp3-core/inspection-type/111111');
    $result->assertNotFound();
});
