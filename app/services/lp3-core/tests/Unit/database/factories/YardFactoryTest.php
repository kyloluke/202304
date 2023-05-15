<?php

use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $yard = Yard::factory()->create();
    $this->assertInstanceOf(Yard::class, $yard);
});
