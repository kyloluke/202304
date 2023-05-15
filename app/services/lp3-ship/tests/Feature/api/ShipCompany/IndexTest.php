<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipCompany;

it('no ship-company', function () {
    /** @var TestCase $this */
    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-company');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all ship-companies', function () {
    /** @var TestCase $this */
    ShipCompany::factory()->count(4)->create();

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-company');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});

it('get ship-companies with search parameter', function () {
    /** @var TestCase $this */
    ShipCompany::factory()->count(4)->create();

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-company?keyword=&&&"#xxxx船会社');
    $result->assertOk();

    $result = $this->json('get', 'api/lp3-ship/ship-company?keyword=');
    $result->assertOk();
});
