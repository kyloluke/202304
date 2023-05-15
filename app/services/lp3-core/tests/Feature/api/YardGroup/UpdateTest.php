<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\App\Models\YardGroupIrregularBusinessDays;
use Services\Lp3Core\App\Models\YardGroupIrregularHolidays;
use Services\Lp3Core\App\Models\YardGroupRegularHolidays;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

it('validate errors required params are empty', function () {
    /** @var TestCase $this */
    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => "",
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertJsonValidationErrors(['name']);
});

it('validate errors integer params are incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'defaultPolId' => "test",
        'representativeYardId' => "test",
        'defaultCustomBrokerOfficeIds' => ["test"],
        'defaultCargoLoaderOfficeIds' => ["test"],
        'defaultStockManagerOfficeIds' => ["test"],
        'defaultWarehouseOwnerOfficeIds' => ["test"],
        'defaultDrayagerOfficeIds' => ["test"],
        'managerIds' => ["test"],
        'regularHolidays' => [
            [
                'id' => "test",
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day')),
            ]
        ],
        'irregularHolidays' => [
            [
                'id' => "test",
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+2 day')),
            ],
        ],
        'irregularBusinessDays' => [
            [
                'id' => "test",
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+4 day')),
            ]
        ],
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertJsonValidationErrors([
            'defaultPolId',
            'representativeYardId',
            'defaultCustomBrokerOfficeIds.0',
            'defaultCargoLoaderOfficeIds.0',
            'defaultStockManagerOfficeIds.0',
            'defaultWarehouseOwnerOfficeIds.0',
            'defaultDrayagerOfficeIds.0',
            'managerIds.0',
            'regularHolidays.0.id',
            'irregularHolidays.0.id',
            'irregularBusinessDays.0.id',
        ]);
});

it('validate errors date params are incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);
    $irregularHolidays = YardGroupIrregularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);
    $irregularBusinessDays = YardGroupIrregularBusinessDays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'representativeYardId' => "test",
        'receptionTimeWeekdaysFrom' => "test",
        'receptionTimeWeekdaysTo' => "test",
        'receptionTimeSaturdayFrom' => "test",
        'receptionTimeSaturdayTo' => "test",
        'restTimeFrom' => "test",
        'restTimeTo' => "test",
        'regularHolidays' => [
            [
                'id' => $regularHolidays->id,
                'startDate' => "test",
                'endDate' => "test",
            ]
        ],
        'irregularHolidays' => [
            [
                'id' => $irregularHolidays->id,
                'date' => "test",
            ]
        ],
        'irregularBusinessDays' => [
            [
                'id' => $irregularBusinessDays->id,
                'date' => "test",
            ]
        ]
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertJsonValidationErrors([
            'representativeYardId',
            'receptionTimeWeekdaysFrom',
            'receptionTimeWeekdaysTo',
            'receptionTimeSaturdayFrom',
            'receptionTimeSaturdayTo',
            'restTimeFrom',
            'restTimeTo',
            'regularHolidays.0.startDate',
            'regularHolidays.0.endDate',
            'irregularHolidays.0.date',
            'irregularBusinessDays.0.date',
        ]);
});

it('validate errors boolean params are incorrect incorrect data type', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);
    $irregularHolidays = YardGroupIrregularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);
    $irregularBusinessDays = YardGroupIrregularBusinessDays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'regularHolidays' => [
            [
                'id' => $regularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day')),
                'mondayFlg' => "test",
                'tuesdayFlg' => "test",
                'wednesdayFlg' => "test",
                'thursdayFlg' => "test",
                'fridayFlg' => "test",
                'saturdayFlg' => "test",
                'sundayFlg' => "test",
                'nationalHolidaysFlg' => "test"
            ]
        ],
        'irregularHolidays' => [
            [
                'id' => $irregularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+2 day')),
            ]
        ],
        'irregularBusinessDays' => [
            [
                'id' => $irregularBusinessDays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+4 day')),
            ]
        ],

    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertJsonValidationErrors([
            'regularHolidays.0.mondayFlg',
            'regularHolidays.0.tuesdayFlg',
            'regularHolidays.0.wednesdayFlg',
            'regularHolidays.0.thursdayFlg',
            'regularHolidays.0.fridayFlg',
            'regularHolidays.0.saturdayFlg',
            'regularHolidays.0.sundayFlg',
            'regularHolidays.0.nationalHolidaysFlg'
        ]);
});

it('get response bad request cuz end dates are empty', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'regularHolidays' => [
            [
                'id' => $regularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true,
            ],
            [
                'id' => $regularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true,
            ]
        ],
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('get response bad request cuz start date is incorrect', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'regularHolidays' => [
            [
                'id' => $regularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day')),
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true,
            ],
            [
                'id' => $regularHolidays->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => "",
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true,
            ]
        ],
    ];

    // api call
    $this
        ->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('updates a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yards = Yard::factory(2)->create();
    $ports = Port::factory(2)->create();
    $targetYardGroup = YardGroup::factory()->hasAttached(
        OfficeBusinessTypes::factory()->create(['business_type' => BusinessType::CUSTOM_BROKER->value]),
    )->hasAttached(
        OfficeBusinessTypes::factory()->create(['business_type' => BusinessType::CARGO_LOADER->value]),
    )->hasAttached(
        OfficeBusinessTypes::factory()->create(['business_type' => BusinessType::STOCK_MANAGER->value]),
    )->hasAttached(
        OfficeBusinessTypes::factory()->create(['business_type' => BusinessType::WAREHOUSE_OWNER->value]),
    )->hasAttached(
        OfficeBusinessTypes::factory()->create(['business_type' => BusinessType::CUSTOM_BROKER->value]),
    )->hasAttached(
        User::factory(),
        [],
        'managers'
    )->create([
        'representative_yard_id' => $yards[0]->id,
        'default_pol_id' => $ports[0]->id,
    ]);
    YardGroupRegularHolidays::factory(['yard_group_id' => $targetYardGroup->id])->create();
    YardGroupIrregularHolidays::factory(['yard_group_id' => $targetYardGroup->id])->create();
    YardGroupIrregularBusinessDays::factory(['yard_group_id' => $targetYardGroup->id])->create();

    // 更新内容作成
    $users = User::factory(3)->create();
    $defaultCustomBrokerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CUSTOM_BROKER->value]);
    $defaultCargoLoaderOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CARGO_LOADER->value]);
    $defaultStockManagerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::STOCK_MANAGER->value]);
    $defaultWarehouseOwnerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::WAREHOUSE_OWNER->value]);
    $defaultDrayagerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::DRAYAGER->value]);

    $dataForUpdating = [
        'name' => "test",
        'representativeYardId' => $yards[1]->id,
        'receptionTimeWeekdaysFrom' => '11:00',
        'receptionTimeWeekdaysTo' => '20:00',
        'receptionTimeSaturdayFrom' => '11:00',
        'receptionTimeSaturdayTo' => '20:00',
        'restTimeFrom' => '14:00',
        'restTimeTo' => '15:00',
        'defaultPolId' => $ports[1]->id,
        'defaultCustomBrokerOfficeIds' => [
            $defaultCustomBrokerOffices[0]->office_id,
            $defaultCustomBrokerOffices[1]->office_id
        ],
        'defaultCargoLoaderOfficeIds' => [
            $defaultCargoLoaderOffices[0]->office_id,
            $defaultCargoLoaderOffices[1]->office_id
        ],
        'defaultStockManagerOfficeIds' => [
            $defaultStockManagerOffices[0]->office_id,
            $defaultStockManagerOffices[1]->office_id
        ],
        'defaultWarehouseOwnerOfficeIds' => [
            $defaultWarehouseOwnerOffices[0]->office_id,
            $defaultWarehouseOwnerOffices[1]->office_id
        ],
        'defaultDrayagerOfficeIds' => [
            $defaultDrayagerOffices[0]->office_id,
            $defaultDrayagerOffices[1]->office_id
        ],
        'managerIds' => [
            $users[0]->id,
            $users[1]->id,
            $users[2]->id,
        ],
        'regularHolidays' => [
            [
                'id' => $targetYardGroup->regularHolidays[0]->id,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day')),
                'mondayFlg' => "",
                'tuesdayFlg' => false,
                'wednesdayFlg' => "",
                'thursdayFlg' => "",
                'fridayFlg' => true,
                'saturdayFlg' => "",
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true
            ],
            [
                'id' => "",
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+4 day')),
                'endDate' => "",
                'mondayFlg' => "",
                'tuesdayFlg' => "",
                'wednesdayFlg' => "",
                'thursdayFlg' => "",
                'fridayFlg' => "",
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true
            ],
        ],
        'irregularHolidays' => [
            [
                'id' => $targetYardGroup->irregularHolidays[0]->id,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day'))
            ],
            [
                'id' => "",
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+6 day'))
            ],
        ],
        'irregularBusinessDays' => [
            [
                'id' => $targetYardGroup->irregularBusinessDays[0]->id,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+7 day'))
            ],
            [
                'id' => "",
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+8 day'))
            ],
        ],
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/yard-group/' . $targetYardGroup->id, $dataForUpdating);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */

    // 更新内容作成
    $dataForUpdating = [
        'name' => "test",
    ];

    // api call
    $result = $this->json('put', 'api/lp3-core/yard-group/100', $dataForUpdating);

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});
