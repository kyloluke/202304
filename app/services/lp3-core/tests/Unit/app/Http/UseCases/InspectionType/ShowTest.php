<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\Show;
use Services\Lp3Core\App\Models\InspectionType;
use Tests\TestCase;

it('gets a inspection-type', function () {
    /** @var TestCase $this */

    $type = InspectionType::factory()->create();
    $useCase = new Show();
    $resData = $useCase($type->id);
    $this->assertEquals($type->name, $resData->name);
});
