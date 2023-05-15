<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;

it('delete a chassis', function () {
    /** @var TestCase $this */

    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create();

    $result = $this->json('delete', '/api/lp3-cargo/chassis/' . $chassis->id);
    $result->assertOk();
    $this->assertSoftDeleted($chassis);
});
