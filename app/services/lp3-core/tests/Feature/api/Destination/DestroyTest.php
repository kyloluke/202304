<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\Destination;

it('deletes a destination', function () {
    /** @var TestCase $this */

    $destination = Destination::factory()->create();
    $result = $this->json('delete', 'api/lp3-core/destination/' . $destination->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-core/destination/' . $destination->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    $result = $this->json('delete', 'api/lp3-core/destination/111111');
    $result->assertNotFound();
});
