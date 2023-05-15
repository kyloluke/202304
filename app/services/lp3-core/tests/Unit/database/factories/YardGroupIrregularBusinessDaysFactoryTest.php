<?php

use Services\Lp3Core\App\Models\YardGroupIrregularBusinessDays;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $yardGroupIrregularBusinessDays = YardGroupIrregularBusinessDays::factory()->create();
    $this->assertInstanceOf(YardGroupIrregularBusinessDays::class, $yardGroupIrregularBusinessDays);
});
