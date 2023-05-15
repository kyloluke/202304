<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipCompany;

it('deletes a ship-company', function () {
    /** @var TestCase $this */

    $shipCompany = ShipCompany::factory()->create();

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-company/' . $shipCompany->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-ship/ship-company/' . $shipCompany->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-company/111111');
    $result->assertNotFound();
});
