<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\Index;
use Services\Lp3Core\App\Models\InspectionType;
use Tests\TestCase;

it('gets all inspection-types', function () {
    /** @var TestCase $this */


    $type_1 = InspectionType::factory()->create();
    $type_2 = InspectionType::factory()->create();

    $useCase = new Index();
    $resData = $useCase();

    $this->assertEquals($resData->count(), 2);
    $this->assertEquals($type_1->name, $resData[0]->name);
    $this->assertEquals($type_2->name, $resData[1]->name);
});
