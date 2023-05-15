<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Port;

it('no port', function () {
    /** @var TestCase $this */

    $result = $this->json('get', 'api/lp3-core/port');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all ports', function () {
    /** @var TestCase $this */
    Port::factory()->count(4)->create();
    $result = $this->json('get', 'api/lp3-core/port');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});
