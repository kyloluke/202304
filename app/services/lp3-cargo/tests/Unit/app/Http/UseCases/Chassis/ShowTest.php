<?php

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Show;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;
use Tests\TestCase;

it('show a chassis', function () {
    /** @var TestCase $this */

    $data = [
        'displacement' => '1800',
        'weight' => '1200',
        'extent' => '480',
        'width' => '140.55',
        'height' => '120'
    ];

    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create($data);

    $useCase = new Show;
    $result = $useCase($chassis->id)->toArray();

    $this->assertEquals($result['displacement'], $data['displacement']);
    $this->assertEquals($result['weight'], $data['weight']);
    $this->assertEquals($result['extent'], $data['extent']);
    $this->assertEquals($result['width'], $data['width']);
    $this->assertEquals($result['height'], $data['height']);
});
