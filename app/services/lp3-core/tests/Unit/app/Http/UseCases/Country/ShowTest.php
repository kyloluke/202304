<?php

use Services\Lp3Core\App\Http\UseCases\Country\Show;
use Services\Lp3Core\App\Models\Country;
use Tests\TestCase;

it('gets a country', function () {
    /** @var TestCase $this */

    $country = Country::factory()->create();
    $useCase = new Show();
    $resData = $useCase($country->id);
    $this->assertEquals($country->name, $resData->name);
    $this->assertEquals($country->region_id, $resData->region_id);
});
