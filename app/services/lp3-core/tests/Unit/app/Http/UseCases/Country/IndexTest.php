<?php

use Services\Lp3Core\App\Http\UseCases\Country\Index;
use Services\Lp3Core\App\Models\Country;
use Tests\TestCase;

it('gets all countries', function () {
    /** @var TestCase $this */

    $country_1 = Country::factory()->create();
    $country_2 = Country::factory()->create();

    $useCase = new Index();
    $resData = $useCase();

    $this->assertEquals($resData->count(), 2);
    $this->assertEquals($country_1->name, $resData[0]->name);
    $this->assertEquals($country_2->name, $resData[1]->name);
    $this->assertEquals($country_1->region_id, $resData[0]->region_id);
    $this->assertEquals($country_2->region_id, $resData[1]->region_id);
});
