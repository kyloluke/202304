<?php

use Services\Lp3Core\App\Models\YardGroupIrregularHolidays;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $yardGroupIrregularHolidays = YardGroupIrregularHolidays::factory()->create();
    $this->assertInstanceOf(YardGroupIrregularHolidays::class, $yardGroupIrregularHolidays);
});
