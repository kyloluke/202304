<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Core\App\Models\Yard;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

it('validate errors required params are empty', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "",
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/yard-group', $data)
        ->assertJsonValidationErrors(['name']);
});

it('validate errors integer params are incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'defaultPolId' => "test",
        'representativeYardId' => "test",
        'defaultCustomBrokerOfficeIds' => ["test"],
        'defaultCargoLoaderOfficeIds' => ["test"],
        'defaultStockManagerOfficeIds' => ["test"],
        'defaultWarehouseOwnerOfficeIds' => ["test"],
        'defaultDrayagerOfficeIds' => ["test"],
        'managerIds' => ["test"],
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/yard-group', $data)
        ->assertJsonValidationErrors([
            'defaultPolId',
            'representativeYardId',
            'defaultCustomBrokerOfficeIds.0',
            'defaultCargoLoaderOfficeIds.0',
            'defaultStockManagerOfficeIds.0',
            'defaultWarehouseOwnerOfficeIds.0',
            'defaultDrayagerOfficeIds.0',
            'managerIds.0'
        ]);
});

it('validate errors date params are incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'representativeYardId' => "test",
        'receptionTimeWeekdaysFrom' => "test",
        'receptionTimeWeekdaysTo' => "test",
        'receptionTimeSaturdayFrom' => "test",
        'receptionTimeSaturdayTo' => "test",
        'restTimeFrom' => "test",
        'restTimeTo' => "test",
        'regularHolidays' => [
            [
                'startDate' => "test",
                'endDate' => "test",
            ]
        ],
        'irregularHolidays' => ["test"],
        'irregularBusinessDays' => ["test"]
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/yard-group', $data)
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
            'irregularHolidays.0',
            'irregularBusinessDays.0',
        ]);
});

it('validate errors boolean params are incorrect incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "test",
        'regularHolidays' => [
            [
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
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/yard-group', $data)
        ->assertJsonValidationErrors([
            'regularHolidays.0.mondayFlg',
            'regularHolidays.0.tuesdayFlg',
            'regularHolidays.0.wednesdayFlg',
            'regularHolidays.0.thursdayFlg',
            'regularHolidays.0.fridayFlg',
            'regularHolidays.0.saturdayFlg',
            'regularHolidays.0.sundayFlg',
            'regularHolidays.0.nationalHolidaysFlg',
        ]);
});

it('occurs end date setting exception', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "テスト",
        'regularHolidays' => [
            [
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
        ->json('post', 'api/lp3-core/yard-group', $data)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('occurs start date setting exception', function () {
    /** @var TestCase $this */

    // 更新内容作成
    $data = [
        'name' => "テスト",
        'regularHolidays' => [
            [
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
        ->json('post', 'api/lp3-core/yard-group', $data)
        ->assertStatus(Response::HTTP_BAD_REQUEST);
});

it('creates a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yard = Yard::factory()->create();
    $users = User::factory(3)->create();
    $defaultCustomBrokerOffice = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CUSTOM_BROKER->value]);
    $defaultCargoLoaderOffice = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CARGO_LOADER->value]);
    $defaultStockManagerOffice = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::STOCK_MANAGER->value]);
    $defaultWarehouseOwnerOffice = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::WAREHOUSE_OWNER->value]);
    $defaultDrayagerOffice = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::DRAYAGER->value]);
    $port = Port::factory()->create();

    // 登録データ作成
    $data = [
        'name' => "テスト",
        'representativeYardId' => $yard->id,
        'receptionTimeWeekdaysFrom' => '10:00',
        'receptionTimeWeekdaysTo' => '19:00',
        'receptionTimeSaturdayFrom' => '10:00',
        'receptionTimeSaturdayTo' => '19:00',
        'restTimeFrom' => '12:00',
        'restTimeTo' => '13:00',
        'defaultPolId' => $port->id,
        'defaultCustomBrokerOfficeIds' => [
            $defaultCustomBrokerOffice[0]->office_id,
            $defaultCustomBrokerOffice[1]->office_id
        ],
        'defaultCargoLoaderOfficeIds' => [
            $defaultCargoLoaderOffice[0]->office_id,
            $defaultCargoLoaderOffice[1]->office_id
        ],
        'defaultStockManagerOfficeIds' => [
            $defaultStockManagerOffice[0]->office_id,
            $defaultStockManagerOffice[1]->office_id
        ],
        'defaultWarehouseOwnerOfficeIds' => [
            $defaultWarehouseOwnerOffice[0]->office_id,
            $defaultWarehouseOwnerOffice[1]->office_id
        ],
        'defaultDrayagerOfficeIds' => [
            $defaultDrayagerOffice[0]->office_id,
            $defaultDrayagerOffice[1]->office_id
        ],
        'managerIds' => [
            $users[0]->id,
            $users[1]->id,
            $users[2]->id,
        ],
        'regularHolidays' => [
            [
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
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+4 day')),
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
            date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+2 day')),
            date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+6 day'))
        ],
        'irregularBusinessDays' => [
            date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+7 day')),
            date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+8 day'))
        ],
    ];

    // api call
    $result = $this->json('post', 'api/lp3-core/yard-group', $data);

    // レスポンスが正常に返ってくることを確認
    $result->assertCreated();
});
