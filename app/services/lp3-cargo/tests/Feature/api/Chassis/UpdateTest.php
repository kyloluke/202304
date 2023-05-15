<?php

use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CargoType;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Job\App\Enums\JobType;
use Illuminate\Support\Arr;
use Tests\TestCase;

// 必須チェック
$data1 = [
    'type' => 1,
    'data' => [
        'yardId' => null,
        'type' => null
    ]
];

// 形チェック
$data2 = [
    'type' => 2,
    'data' => [
        'yardId' => 'test33',
        'type' => 'test',
        'moveInScheduleDate' => '2020',
        'carModelId' => '334',
        'number' => '#DG-dfsa324-cgfy5465-A',
        'displacement' => 'test',
        'weight' => 'test.35',
        'extent' => 'test.33',
        'width' => 'test140.55',
        'height' => 'test120.00',
        'm3' => 'error3.24',
        'movable' => 'true111',
        'shipperId' => 'test111',
        'shipperRefNo' => '#DG4454363hff',
        'primeForwarderId' => 'gdfsa',
        'requireCollectKey' => 'need type of bool',
        'requireExtraLashing' => 'need type of bool',
        'requirePhotoForSale' => 'need type of bool',
        'remarks' => 'test remarks',
        'innerCargoRemarks' => 'test inner remarks',
        'adminRemarks' => 'test admin remarks',
        'expectedJobType' => 'dga3423'
    ]
];

// 有効・無効チェック
$data3 = [
    'type' => 3,
    'data' => [
        'yardId' => 1111,
        'type' => 1111,
        'moveInScheduleDate' => '',
        'carModelId' => 1111,
        'number' => '#DG-dfsa324-cgfy5465-A',
        'displacement' => '1800',
        'weight' => '1200.35',
        'extent' => 480.33,
        'width' => '140.55',
        'height' => '120.00',
        'm3' => 3.24,
        'movable' => true,
        'shipperId' => 1111,
        'shipperRefNo' => 'daffdaf-2-1',
        'primeForwarderId' => 1111,
        'requireCollectKey' => null,
        'requireExtraLashing' => null,
        'requirePhotoForSale' => false,
        'remarks' => 'test remarks',
        'innerCargoRemarks' => '',
        'adminRemarks' => 'test admin remarks',
        'expectedJobType' => 11111
    ]
];

it('create-chassis validation failed', function ($data) {
    /** @var TestCase $this */

    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create();

    switch ($data['type']) {
        case 1:
            $this->json('put', '/api/lp3-cargo/chassis/' . $chassis->id, $data['data'])
                ->assertOk();
            break;
        case 2:
            $this->json('put', '/api/lp3-cargo/chassis/' . $chassis->id, $data['data'])
                ->assertJsonValidationErrors([
                    'carModelId', 'displacement', 'weight', 'extent', 'width', 'height', 'm3', 'movable', 'shipperId',
                    'primeForwarderId', 'requireCollectKey', 'requireExtraLashing', 'requirePhotoForSale', 'expectedJobType',
                ]);
            break;
        case 3:
            $this->json('put', '/api/lp3-cargo/chassis/' . $chassis->id, $data['data'])
                ->assertJsonValidationErrors(['carModelId', 'shipperId', 'primeForwarderId', 'expectedJobType']);
            break;

    }

})->with([
    [$data1],
    [$data2],
    [$data3]
]);

it('update a chassis', function () {
    /** @var TestCase $this */

    $shipper = Office::factory()->create();
    $primeForwarder = Office::factory()->create();
    $expectedJobType = Arr::random(array_column(JobType::cases(), 'value'));
    $carModel = CarModel::factory()->create();
    $cargoType = CargoType::factory()->create();
    $chassis = Chassis::factory()->has(ChassisCarryActivity::factory()->count(3), 'carryActivities')->create(
        ['shipper_id' => $shipper->id,'cargo_type_id' => $cargoType->id]
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

    $result = $this->json('put', '/api/lp3-cargo/chassis/' . $chassis->id, $data);

    $result->assertOk();

    $resultData = json_decode($result->content(), true)['data'];
    $resData = Arr::except($resultData, [
        'carModel', 'cargoType', 'shipper', 'primeForwarder', 'carryActivities',
        'createdBy', 'updatedBy', 'deletedBy', 'deletedAt', 'createdAt', 'updatedAt',
        'expectedJobTypeStr', 'id', 'searchNumber', 'controlNumber'
    ]);
    $this->assertEquals($resData, $data);

});

