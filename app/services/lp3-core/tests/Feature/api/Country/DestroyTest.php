<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;

it('deletes a country', function () {
    /** @var TestCase $this */


    $country = Country::factory()->create();
    $result = $this->json('delete', 'api/lp3-core/country/' . $country->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-core/country/' . $country->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    $result = $this->json('delete', 'api/lp3-core/country/111111');
    $result->assertNotFound();
});
