<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Destination;

it('no destination', function () {
    /** @var TestCase $this */

    $result = $this->json('get', 'api/lp3-core/destination');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all destinations', function () {
    /** @var TestCase $this */
    Destination::factory()->count(4)->create();
    $result = $this->json('get', 'api/lp3-core/destination');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});
