<?php

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Destroy;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;
use Tests\TestCase;

it('delete a chassis', function () {
    /** @var TestCase $this */

    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create();

    $useCase = new Destroy;
    $result = $useCase($chassis->id);
    $this->assertSoftDeleted($chassis);
});
