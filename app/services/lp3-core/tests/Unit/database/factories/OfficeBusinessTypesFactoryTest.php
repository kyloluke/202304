<?php

use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $officeBusinessTypes = OfficeBusinessTypes::factory()->create();
    $this->assertInstanceOf(OfficeBusinessTypes::class, $officeBusinessTypes);
});
