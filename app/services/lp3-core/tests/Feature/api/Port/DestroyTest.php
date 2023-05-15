<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Port;

it('deletes a port', function () {
    /** @var TestCase $this */
    $port = Port::factory()->create();
    $result = $this->json('delete', 'api/lp3-core/port/' . $port->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-core/port/' . $port->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    $result = $this->json('delete', 'api/lp3-core/port/111111');
    $result->assertNotFound();
});
