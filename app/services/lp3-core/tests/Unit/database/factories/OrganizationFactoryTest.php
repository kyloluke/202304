<?php

use Services\Lp3Core\App\Models\Organization;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $office = Organization::factory()->create();
    $this->assertInstanceOf(Organization::class, $office);
});
