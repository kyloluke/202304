<?php

use Services\Lp3Core\App\Models\YardGroup;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $yardGroup = YardGroup::factory()->create();
    $this->assertInstanceOf(YardGroup::class, $yardGroup);
});
