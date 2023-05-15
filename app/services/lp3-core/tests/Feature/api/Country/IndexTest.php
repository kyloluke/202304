<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Country;

it('no country', function () {
    /** @var TestCase $this */

    $result = $this->json('get', 'api/lp3-core/country');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all countries', function () {
    /** @var TestCase $this */
    Country::factory()->count(4)->create();
    $result = $this->json('get', 'api/lp3-core/country');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});
