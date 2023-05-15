<?php

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Update;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CargoType;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Job\App\Enums\JobType;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\TestCase;

it('update a chassis', function () {
    /** @var TestCase $this */

    $shipper = Office::factory()->create();
    $primeForwarder = Office::factory()->create();
    $expectedJobType = Arr::random(array_column(JobType::cases(), 'value'));
    $carModel = CarModel::factory()->create();
    $cargoType = CargoType::factory()->create();
    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create(
        ['shipper_id' => $shipper->id, 'cargo_type_id' => $cargoType->id]
    );// 更新ターゲット

    $data = [
        'cargoTypeId' => $cargoType->id,
        'carModelId' => $carModel->id,
        'number' => '#DG-dfsa324-cgfy5465-A',
        'displacement' => 1800,
        'weight' => 1200.35,
        'extent' => 480.33,
        'width' => 140.55,
        'height' => 120.01,
        'm3' => 3.24,
        'movable' => true,
        'shipperId' => $shipper->id,
        'shipperRefNo' => 'daffdaf-2-1',
        'primeForwarderId' => $primeForwarder->id,
        'requireCollectKey' => false,
        'requireExtraLashing' => true,
        'requirePhotoForSale' => false,
        'remarks' => 'test remarks',
        'innerCargoRemarks' => 'this is a update action',
        'adminRemarks' => 'test admin remarks',
        'expectedJobType' => $expectedJobType
    ];

    $useCase = new Update;

    $result = $useCase($chassis->id, $data)->toArray();

    $resData = Arr::except($result, [
        'car_model', 'cargo_type', 'shipper', 'prime_forwarder', 'carry_activities',
        'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at',
        'id', 'search_number', 'control_number'
    ]);

    $tempData = [];
    foreach ($data as $k => $v) {
        $tempData[Str::snake($k)] = $v;
    }
    $this->assertEquals($resData, $tempData);
});
