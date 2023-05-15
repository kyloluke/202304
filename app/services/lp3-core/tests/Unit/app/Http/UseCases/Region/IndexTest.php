<?php

use Services\Lp3Core\App\Http\UseCases\Region\Index;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('gets all region', function () {
    /** @var TestCase $this */

    $region_1 = Region::factory()->create();
    $region_2 = Region::factory()->create();

    $useCase = new Index();
    $resData = $useCase();

    $this->assertEquals($resData->count(), 2);
    $this->assertEquals($region_1->name, $resData[0]->name);
    $this->assertEquals($region_2->name, $resData[1]->name);
});
