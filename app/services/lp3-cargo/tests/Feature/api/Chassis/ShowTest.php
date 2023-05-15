<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;

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

    $result = $this->json('get', '/api/lp3-cargo/chassis/' . $chassis->id);

    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['displacement'], $data['displacement']);
    $this->assertEquals($resData['weight'], $data['weight']);
    $this->assertEquals($resData['extent'], $data['extent']);
    $this->assertEquals($resData['width'], $data['width']);
    $this->assertEquals($resData['height'], $data['height']);
});
