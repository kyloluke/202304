<?php

use Services\Lp3Core\App\Http\UseCases\Country\Destroy;
use Services\Lp3Core\App\Models\Country;
use Tests\TestCase;

it('deletes a country', function () {
    /** @var TestCase $this */
    $country = Country::factory()->create();
    $useCase = new Destroy();
    $result = $useCase($country->id);
    $this->assertEquals($country->name, $result->name);
    $this->assertEquals($country->region_id, $result->region_id);
    $this->assertSoftDeleted($country);
});
