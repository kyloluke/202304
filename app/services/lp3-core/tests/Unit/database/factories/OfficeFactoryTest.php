<?php

use Services\Lp3Core\App\Models\Office;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $office = Office::factory()->create();
    $this->assertInstanceOf(Office::class, $office);
});
