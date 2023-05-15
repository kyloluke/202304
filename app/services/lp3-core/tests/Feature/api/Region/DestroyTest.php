<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Region;

it('deletes a country', function () {
    /** @var TestCase $this */


    $region = Region::factory()->create();
    $result = $this->json('delete', 'api/lp3-core/region/' . $region->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-core/region/' . $region->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    $result = $this->json('delete', 'api/lp3-core/region/111111');
    $result->assertNotFound();
});
