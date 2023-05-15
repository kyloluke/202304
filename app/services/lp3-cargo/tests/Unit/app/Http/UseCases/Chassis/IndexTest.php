<?php

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Index;
use Services\Lp3Cargo\App\Models\Chassis;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Tests\TestCase;

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
    $searchData = [];
    $useCase = new Index();
    $result = $useCase($searchData);
    $this->assertEquals(3, $result->count());
});
