<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\Destroy;
use Services\Lp3Core\App\Models\InspectionType;
use Tests\TestCase;

it('deletes a inspection-type', function () {
    /** @var TestCase $this */
    $inspectionType = InspectionType::factory()->create();
    $useCase = new Destroy();
    $result = $useCase($inspectionType->id);
    $this->assertEquals($inspectionType->name, $result->name);
    $this->assertSoftDeleted($inspectionType);
});
