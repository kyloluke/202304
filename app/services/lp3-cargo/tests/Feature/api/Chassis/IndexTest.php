<?php

use Illuminate\Database\Eloquent\Factories\Sequence;
use Services\Lp3Cargo\App\Models\Chassis;
use Illuminate\Support\Arr;
use Tests\TestCase;

it('get all chassis with parameter error', function () {
    /** @var TestCase $this */

    $parameters = [
        'controlNumber' => 'STK3432-342',
        'number' => null,
        'shipperId' => 12,
        'movable' => 2,
        'carModelId' => 12,
        'm3Min' => 2,
        'm3Max' => 7.7
    ];

    $queryStr = Arr::query($parameters);

    $result = $this->json('get', '/api/lp3-cargo/chassis?' . $queryStr);

    $result->assertJsonValidationErrors(['shipperId', 'movable', 'carModelId']);

});

it('get all chassis', function () {
    /** @var TestCase $this */

    $incrementId = Chassis::getIncrementId();
    $data1 = [
        'control_number' => $incrementId + 1,
        'displacement' => '1800',
        'weight' => '1200',
        'extent' => '480',
    ];
    $data2 = [
        'control_number' => $incrementId + 2,
        'displacement' => '1800',
        'weight' => '1200',
        'extent' => '480',
    ];
    $data3 = [
        'control_number' => $incrementId + 3,
        'displacement' => '1800',
        'weight' => '1200',
        'extent' => '480',
    ];

    $chassis = Chassis::factory()
        ->count(3)
        ->state(new Sequence(
            $data1, $data2, $data3
        ))
        ->create();

    $result = $this->json('get', '/api/lp3-cargo/chassis/');
    $result->assertOk();
    $result->assertJsonCount(3, 'data');
});

