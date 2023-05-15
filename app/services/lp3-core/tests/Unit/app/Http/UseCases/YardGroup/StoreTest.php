<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupSaveException;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Store;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('occurs start date setting exception', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "テスト",
        'representativeYardId' => null,
        'receptionTimeWeekdaysFrom' => '10:00',
        'receptionTimeWeekdaysTo' => '19:00',
        'receptionTimeSaturdayFrom' => '10:00',
        'receptionTimeSaturdayTo' => '19:00',
        'restTimeFrom' => '12:00',
        'restTimeTo' => '13:00',
        'defaultPolId' => null,
        'defaultCustomBrokerOfficeIds' => [],
        'defaultCargoLoaderOfficeIds' => [],
        'defaultStockManagerOfficeIds' => [],
        'defaultWarehouseOwnerOfficeIds' => [],
        'defaultDrayagerOfficeIds' => [],
        'managerIds' => [],
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
        'irregularHolidays' => [],
        'irregularBusinessDays' => [],

    ];

    // 例外が返ってくることを確認
    $this->expectException(YardGroupSaveException::class);

    // ユースケース呼び出し
    $useCase = new Store();
    $useCase($data);
});

it('occurs end date setting exception', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'name' => "テスト",
        'representativeYardId' => null,
        'receptionTimeWeekdaysFrom' => '10:00',
        'receptionTimeWeekdaysTo' => '19:00',
        'receptionTimeSaturdayFrom' => '10:00',
        'receptionTimeSaturdayTo' => '19:00',
        'restTimeFrom' => '12:00',
        'restTimeTo' => '13:00',
        'defaultPolId' => null,
        'defaultCustomBrokerOfficeIds' => [],
        'defaultCargoLoaderOfficeIds' => [],
        'defaultStockManagerOfficeIds' => [],
        'defaultWarehouseOwnerOfficeIds' => [],
        'defaultDrayagerOfficeIds' => [],
        'managerIds' => [],
        'regularHolidays' => [
            [
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+1 day')),
                'endDate' => null,
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
                'endDate' => null,
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true,
            ],
            'irregularHolidays' => [],
            'irregularBusinessDays' => [],
        ],
        'irregularHolidays' => [],
        'irregularBusinessDays' => [],
    ];

    // 例外が返ってくることを確認
    $this->expectException(YardGroupSaveException::class);

    // ユースケース呼び出し
    $useCase = new Store();
    $useCase($data);
});


it('creates a yard group', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $yard = Yard::factory()->create();
    $users = User::factory(3)->create();
    $defaultCustomBrokerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CUSTOM_BROKER->value]);
    $defaultCargoLoaderOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::CARGO_LOADER->value]);
    $defaultStockManagerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::STOCK_MANAGER->value]);
    $defaultWarehouseOwnerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::WAREHOUSE_OWNER->value]);
    $defaultDrayagerOffices = OfficeBusinessTypes::factory(2)->create(['business_type' => BusinessType::DRAYAGER->value]);
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
                'startDate' => '2024-01-01 00:00:00',
                'endDate' => null,
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => true,
                'saturdayFlg' => false,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true
            ],
        ],
        'irregularHolidays' => [
            '2023-05-05 00:00:00',
            '2023-05-06 00:00:00',
            '2023-05-07 00:00:00',
        ],
        'irregularBusinessDays' => [
            '2024-01-01 00:00:00',
            '2024-01-02 00:00:00',
            '2024-01-03 00:00:00',
        ],
    ];
    // ユースケース呼び出し
    $useCase = new Store();
    $result = $useCase($data);

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->representative_yard_id, $data['representativeYardId']);
    $this->assertEquals($result->reception_time_weekdays_from, $data['receptionTimeWeekdaysFrom']);
    $this->assertEquals($result->reception_time_weekdays_to, $data['receptionTimeWeekdaysTo']);
    $this->assertEquals($result->reception_time_saturday_from, $data['receptionTimeSaturdayFrom']);
    $this->assertEquals($result->reception_time_saturday_to, $data['receptionTimeSaturdayTo']);
    $this->assertEquals($result->rest_time_from, $data['restTimeFrom']);
    $this->assertEquals($result->rest_time_to, $data['restTimeTo']);
    $this->assertEquals($result->default_pol_id, $data['defaultPolId']);

    $resultDefaultCustomBrokerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::CUSTOM_BROKER->value)->get();
    $this->assertEquals($resultDefaultCustomBrokerOffices[0]->office_id, $data['defaultCustomBrokerOfficeIds'][0]);
    $this->assertEquals($resultDefaultCustomBrokerOffices[1]->office_id, $data['defaultCustomBrokerOfficeIds'][1]);

    $resultDefaultCargoLoaderOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::CARGO_LOADER->value)->get();
    $this->assertEquals($resultDefaultCargoLoaderOffices[0]->office_id, $data['defaultCargoLoaderOfficeIds'][0]);
    $this->assertEquals($resultDefaultCargoLoaderOffices[1]->office_id, $data['defaultCargoLoaderOfficeIds'][1]);

    $resultDefaultStockManagerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::STOCK_MANAGER->value)->get();
    $this->assertEquals($resultDefaultStockManagerOffices[0]->office_id, $data['defaultStockManagerOfficeIds'][0]);
    $this->assertEquals($resultDefaultStockManagerOffices[1]->office_id, $data['defaultStockManagerOfficeIds'][1]);

    $resultDefaultWarehouseOwnerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::WAREHOUSE_OWNER->value)->get();
    $this->assertEquals($resultDefaultWarehouseOwnerOffices[0]->office_id, $data['defaultWarehouseOwnerOfficeIds'][0]);
    $this->assertEquals($resultDefaultWarehouseOwnerOffices[1]->office_id, $data['defaultWarehouseOwnerOfficeIds'][1]);

    $resultDefaultDrayagerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::DRAYAGER->value)->get();
    $this->assertEquals($resultDefaultDrayagerOffices[0]->office_id, $data['defaultDrayagerOfficeIds'][0]);
    $this->assertEquals($resultDefaultDrayagerOffices[1]->office_id, $data['defaultDrayagerOfficeIds'][1]);

    $this->assertEquals($result->managers[0]->id, $data['managerIds'][0]);
    $this->assertEquals($result->managers[1]->id, $data['managerIds'][1]);
    $this->assertEquals($result->managers[2]->id, $data['managerIds'][2]);

    $this->assertEquals($result->regularHolidays[0]->start_date, $data['regularHolidays'][0]['startDate']);
    $this->assertEquals($result->regularHolidays[0]->end_date, $data['regularHolidays'][0]['endDate']);
    $this->assertEquals($result->regularHolidays[0]->monday_flg, $data['regularHolidays'][0]['mondayFlg']);
    $this->assertEquals($result->regularHolidays[0]->tuesday_flg, $data['regularHolidays'][0]['tuesdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->wednesday_flg, $data['regularHolidays'][0]['wednesdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->thursday_flg, $data['regularHolidays'][0]['thursdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->friday_flg, $data['regularHolidays'][0]['fridayFlg']);
    $this->assertEquals($result->regularHolidays[0]->saturday_flg, $data['regularHolidays'][0]['saturdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->sunday_flg, $data['regularHolidays'][0]['sundayFlg']);
    $this->assertEquals($result->regularHolidays[0]->national_holidays_flg, $data['regularHolidays'][0]['nationalHolidaysFlg']);

    $this->assertEquals($result->irregularHolidays[0]->date, $data['irregularHolidays'][0]);
    $this->assertEquals($result->irregularHolidays[1]->date, $data['irregularHolidays'][1]);
    $this->assertEquals($result->irregularHolidays[2]->date, $data['irregularHolidays'][2]);

    $this->assertEquals($result->irregularBusinessDays[0]->date, $data['irregularBusinessDays'][0]);
    $this->assertEquals($result->irregularBusinessDays[1]->date, $data['irregularBusinessDays'][1]);
    $this->assertEquals($result->irregularBusinessDays[2]->date, $data['irregularBusinessDays'][2]);

    // 登録内容がDBに存在することを確認
    $this->assertDatabaseHas('yard_groups', [
        'name' => $data['name'],
        'representative_yard_id' => $data['representativeYardId'],
        'reception_time_weekdays_from' => $data['receptionTimeWeekdaysFrom'],
        'reception_time_weekdays_to' => $data['receptionTimeWeekdaysTo'],
        'reception_time_saturday_from' => $data['receptionTimeSaturdayFrom'],
        'reception_time_saturday_to' => $data['receptionTimeSaturdayTo'],
        'rest_time_from' => $data['restTimeFrom'],
        'rest_time_to' => $data['restTimeTo'],
        'default_pol_id' => $data['defaultPolId']
    ]);

    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $data['managerIds'][0]]);
    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $data['managerIds'][1]]);
    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $data['managerIds'][2]]);

    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultCustomBrokerOffices[0]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultCustomBrokerOffices[1]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultCargoLoaderOffices[0]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultCargoLoaderOffices[1]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultStockManagerOffices[0]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultStockManagerOffices[1]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultWarehouseOwnerOffices[0]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultWarehouseOwnerOffices[1]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultDrayagerOffices[0]->id]);
    $this->assertDatabaseHas('yard_group_office_business_type', ['yard_group_id' => $result->id, 'office_business_types_id' => $defaultDrayagerOffices[1]->id]);

    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'start_date' => $data['regularHolidays'][0]['startDate']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'end_date' => $data['regularHolidays'][0]['endDate']]);

    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'monday_flg' => $data['regularHolidays'][0]['mondayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'tuesday_flg' => $data['regularHolidays'][0]['tuesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'wednesday_flg' => $data['regularHolidays'][0]['wednesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'thursday_flg' => $data['regularHolidays'][0]['thursdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'friday_flg' => $data['regularHolidays'][0]['fridayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'saturday_flg' => $data['regularHolidays'][0]['saturdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'sunday_flg' => $data['regularHolidays'][0]['sundayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'national_holidays_flg' => $data['regularHolidays'][0]['nationalHolidaysFlg']]);

    $this->assertDatabaseHas('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $data['irregularHolidays'][0]]);
    $this->assertDatabaseHas('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $data['irregularHolidays'][1]]);
    $this->assertDatabaseHas('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $data['irregularHolidays'][2]]);

    $this->assertDatabaseHas('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $data['irregularBusinessDays'][0]]);
    $this->assertDatabaseHas('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $data['irregularBusinessDays'][1]]);
    $this->assertDatabaseHas('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $data['irregularBusinessDays'][2]]);
});
