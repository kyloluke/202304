<?php

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Store;
use Services\Lp3Cargo\Refers\Models\Yard;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Cargo\App\Enums\ChassisCarryType;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CargoType;
use Services\Lp3Job\App\Enums\JobType;
use Illuminate\Support\Arr;
use Tests\TestCase;

it('create a chassis', function () {
    /** @var TestCase $this */
    $yard = Yard::factory()->create();
    $type = Arr::random(array_column(ChassisCarryType::cases(), 'value'));
    $shipper = Office::factory()->create();
    $primeForwarder = Office::factory()->create();
    $expectedJobType = Arr::random(array_column(JobType::cases(), 'value'));
    $carModel = CarModel::factory()->create();
    $cargoType = CargoType::factory()->create();
    $data = [
        'cargoTypeId' => $cargoType->id,
        'yardId' => $yard->id,
        'type' => $type,
        'moveInScheduleDate' => '20230202',
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
        'requireCollectKey' => null,
        'requireExtraLashing' => null,
        'requirePhotoForSale' => false,
        'remarks' => 'test remarks',
        'innerCargoRemarks' => null,
        'adminRemarks' => 'test admin remarks',
        'expectedJobType' => $expectedJobType
    ];

    $useCase = new Store;
    $result = $useCase($data)->toArray();

    $resData = Arr::except($result, [
        'car_model', 'cargo_type', 'shipper', 'prime_forwarder', 'carry_activities',
        'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at',
         'id', 'search_number', 'control_number'
    ]);
    $data = Arr::except($data, ['moveInScheduleDate', 'yardId', 'type']);
    $tempData = [];
    foreach($data as $k => $v) {
        $tempData[Str::snake($k)] = $v;
    }
    $this->assertEquals($resData, $tempData);
});
