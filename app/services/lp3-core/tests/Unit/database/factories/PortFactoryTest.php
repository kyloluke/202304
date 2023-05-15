<?php

use Services\Lp3Core\App\Models\Port;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $port = Port::factory()->create();
    $this->assertInstanceOf(Port::class, $port);
});
