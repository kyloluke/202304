<?php

use Tests\TestCase;
use Services\Lp3Core\App\Models\InspectionType;

it('no inspection-types', function () {
    /** @var TestCase $this */

    $result = $this->json('get', 'api/lp3-core/inspection-type');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all inspection-types', function () {
    /** @var TestCase $this */
    InspectionType::factory()->count(4)->create();
    $result = $this->json('get', 'api/lp3-core/inspection-type');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});
