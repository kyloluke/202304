<?php

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupSaveException;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Update;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Core\App\Models\Yard;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\App\Models\YardGroupIrregularBusinessDays;
use Services\Lp3Core\App\Models\YardGroupIrregularHolidays;
use Services\Lp3Core\App\Models\YardGroupRegularHolidays;
use Tests\TestCase;

it('occurs end date setting exception', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'representativeYardId' => $targetYardGroup->representative_yard_id,
        'receptionTimeWeekdaysFrom' => '11:00',
        'receptionTimeWeekdaysTo' => '20:00',
        'receptionTimeSaturdayFrom' => '11:00',
        'receptionTimeSaturdayTo' => '20:00',
        'restTimeFrom' => '14:00',
        'restTimeTo' => '15:00',
        'defaultPolId' => null,
        'defaultCustomBrokerOfficeIds' => [],
        'defaultCargoLoaderOfficeIds' => [],
        'defaultStockManagerOfficeIds' => [],
        'defaultWarehouseOwnerOfficeIds' => [],
        'defaultDrayagerOfficeIds' => [],
        'managerIds' => [],
        'regularHolidays' => [
            [
                'id' => $regularHolidays->id,
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
                'id' => $regularHolidays->id,
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
    ];

    // 例外が返ってくることを確認
    $this->expectException(YardGroupSaveException::class);

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($targetYardGroup, $dataForUpdating);
});

it('occurs start date setting exception', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetYardGroup = YardGroup::factory()->create(['name' => "test"]);
    $regularHolidays = YardGroupRegularHolidays::factory()->create(['yard_group_id' => $targetYardGroup->id]);

    // 更新内容作成
    $dataForUpdating = [
        'name' => $targetYardGroup->name,
        'representativeYardId' => $targetYardGroup->representative_yard_id,
        'receptionTimeWeekdaysFrom' => '11:00',
        'receptionTimeWeekdaysTo' => '20:00',
        'receptionTimeSaturdayFrom' => '11:00',
        'receptionTimeSaturdayTo' => '20:00',
        'restTimeFrom' => '14:00',
        'restTimeTo' => '15:00',
        'defaultPolId' => null,
        'defaultCustomBrokerOfficeIds' => [],
        'defaultCargoLoaderOfficeIds' => [],
        'defaultStockManagerOfficeIds' => [],
        'defaultWarehouseOwnerOfficeIds' => [],
        'defaultDrayagerOfficeIds' => [],
        'managerIds' => [],
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
        'irregularHolidays' => [],
        'irregularBusinessDays' => [],
    ];

    // 例外が返ってくることを確認
    $this->expectException(YardGroupSaveException::class);

    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($targetYardGroup, $dataForUpdating);
});

it('update a yard group', function () {
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
    $yardGroupIrregularHolidays = YardGroupIrregularHolidays::factory(2)->create(['yard_group_id' => $targetYardGroup->id]);
    $yardGroupIrregularBusinessDays = YardGroupIrregularBusinessDays::factory(2)->create(['yard_group_id' => $targetYardGroup->id]);

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
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => true,
                'saturdayFlg' => false,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true
            ],
            [
                'id' => null,
                'startDate' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+4 day')),
                'endDate' => null,
                'mondayFlg' => false,
                'tuesdayFlg' => false,
                'wednesdayFlg' => false,
                'thursdayFlg' => false,
                'fridayFlg' => false,
                'saturdayFlg' => true,
                'sundayFlg' => true,
                'nationalHolidaysFlg' => true
            ],
        ],
        'irregularHolidays' => [
            [
                'id' => $targetYardGroup->irregularHolidays[0]->id,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+3 day')),
            ],
            [
                'id' => null,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+6 day')),
            ],
        ],
        'irregularBusinessDays' => [
            [
                'id' => $targetYardGroup->irregularBusinessDays[0]->id,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+7 day')),
            ],
            [
                'id' => null,
                'date' => date('Y-m-d H:i:s', strtotime(date('y-m-d') . '+8 day')),
            ],
        ],
    ];
    // ユースケース呼び出し
    $useCase = new Update();
    $result = $useCase($targetYardGroup, $dataForUpdating);

    // 取得内容と更新したテストデータが一致していることを確認
    $this->assertEquals($result->name, $dataForUpdating['name']);
    $this->assertEquals($result->representative_yard_id, $dataForUpdating['representativeYardId']);
    $this->assertEquals($result->reception_time_weekdays_from, $dataForUpdating['receptionTimeWeekdaysFrom']);
    $this->assertEquals($result->reception_time_weekdays_to, $dataForUpdating['receptionTimeWeekdaysTo']);
    $this->assertEquals($result->reception_time_saturday_from, $dataForUpdating['receptionTimeSaturdayFrom']);
    $this->assertEquals($result->reception_time_saturday_to, $dataForUpdating['receptionTimeSaturdayTo']);
    $this->assertEquals($result->rest_time_from, $dataForUpdating['restTimeFrom']);
    $this->assertEquals($result->rest_time_to, $dataForUpdating['restTimeTo']);
    $this->assertEquals($result->default_pol_id, $dataForUpdating['defaultPolId']);

    $resultDefaultCustomBrokerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::CUSTOM_BROKER->value)->get();
    $this->assertEquals($resultDefaultCustomBrokerOffices[0]->office_id, $dataForUpdating['defaultCustomBrokerOfficeIds'][0]);
    $this->assertEquals($resultDefaultCustomBrokerOffices[1]->office_id, $dataForUpdating['defaultCustomBrokerOfficeIds'][1]);

    $resultDefaultCargoLoaderOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::CARGO_LOADER->value)->get();
    $this->assertEquals($resultDefaultCargoLoaderOffices[0]->office_id, $dataForUpdating['defaultCargoLoaderOfficeIds'][0]);
    $this->assertEquals($resultDefaultCargoLoaderOffices[1]->office_id, $dataForUpdating['defaultCargoLoaderOfficeIds'][1]);

    $resultDefaultStockManagerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::STOCK_MANAGER->value)->get();
    $this->assertEquals($resultDefaultStockManagerOffices[0]->office_id, $dataForUpdating['defaultStockManagerOfficeIds'][0]);
    $this->assertEquals($resultDefaultStockManagerOffices[1]->office_id, $dataForUpdating['defaultStockManagerOfficeIds'][1]);

    $resultDefaultWarehouseOwnerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::WAREHOUSE_OWNER->value)->get();
    $this->assertEquals($resultDefaultWarehouseOwnerOffices[0]->office_id, $dataForUpdating['defaultWarehouseOwnerOfficeIds'][0]);
    $this->assertEquals($resultDefaultWarehouseOwnerOffices[1]->office_id, $dataForUpdating['defaultWarehouseOwnerOfficeIds'][1]);

    $resultDefaultDrayagerOffices = $result->officeBusinessTypes()->where('business_type', BusinessType::DRAYAGER->value)->get();
    $this->assertEquals($resultDefaultDrayagerOffices[0]->office_id, $dataForUpdating['defaultDrayagerOfficeIds'][0]);
    $this->assertEquals($resultDefaultDrayagerOffices[1]->office_id, $dataForUpdating['defaultDrayagerOfficeIds'][1]);

    $this->assertEquals($result->managers[0]->id, $dataForUpdating['managerIds'][0]);
    $this->assertEquals($result->managers[1]->id, $dataForUpdating['managerIds'][1]);
    $this->assertEquals($result->managers[2]->id, $dataForUpdating['managerIds'][2]);

    $this->assertEquals($result->regularHolidays[0]->start_date, $dataForUpdating['regularHolidays'][0]['startDate']);
    $this->assertEquals($result->regularHolidays[0]->end_date, $dataForUpdating['regularHolidays'][0]['endDate']);
    $this->assertEquals($result->regularHolidays[0]->monday_flg, $dataForUpdating['regularHolidays'][0]['mondayFlg']);
    $this->assertEquals($result->regularHolidays[0]->tuesday_flg, $dataForUpdating['regularHolidays'][0]['tuesdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->wednesday_flg, $dataForUpdating['regularHolidays'][0]['wednesdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->thursday_flg, $dataForUpdating['regularHolidays'][0]['thursdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->friday_flg, $dataForUpdating['regularHolidays'][0]['fridayFlg']);
    $this->assertEquals($result->regularHolidays[0]->saturday_flg, $dataForUpdating['regularHolidays'][0]['saturdayFlg']);
    $this->assertEquals($result->regularHolidays[0]->sunday_flg, $dataForUpdating['regularHolidays'][0]['sundayFlg']);
    $this->assertEquals($result->regularHolidays[0]->national_holidays_flg, $dataForUpdating['regularHolidays'][0]['nationalHolidaysFlg']);

    $this->assertEquals($result->regularHolidays[1]->start_date, $dataForUpdating['regularHolidays'][1]['startDate']);
    $this->assertEquals($result->regularHolidays[1]->end_date, $dataForUpdating['regularHolidays'][1]['endDate']);
    $this->assertEquals($result->regularHolidays[1]->monday_flg, $dataForUpdating['regularHolidays'][1]['mondayFlg']);
    $this->assertEquals($result->regularHolidays[1]->tuesday_flg, $dataForUpdating['regularHolidays'][1]['tuesdayFlg']);
    $this->assertEquals($result->regularHolidays[1]->wednesday_flg, $dataForUpdating['regularHolidays'][1]['wednesdayFlg']);
    $this->assertEquals($result->regularHolidays[1]->thursday_flg, $dataForUpdating['regularHolidays'][1]['thursdayFlg']);
    $this->assertEquals($result->regularHolidays[1]->friday_flg, $dataForUpdating['regularHolidays'][1]['fridayFlg']);
    $this->assertEquals($result->regularHolidays[1]->saturday_flg, $dataForUpdating['regularHolidays'][1]['saturdayFlg']);
    $this->assertEquals($result->regularHolidays[1]->sunday_flg, $dataForUpdating['regularHolidays'][1]['sundayFlg']);
    $this->assertEquals($result->regularHolidays[1]->national_holidays_flg, $dataForUpdating['regularHolidays'][1]['nationalHolidaysFlg']);

    $this->assertEquals($result->irregularHolidays[0]->id, $dataForUpdating['irregularHolidays'][0]['id']);
    $this->assertEquals($result->irregularHolidays[0]->date, $dataForUpdating['irregularHolidays'][0]['date']);
    // irregularHolidays[1]->idについては、新規作成のためidの検証はしておりません。
    $this->assertEquals($result->irregularHolidays[1]->date, $dataForUpdating['irregularHolidays'][1]['date']);

    $this->assertEquals($result->irregularBusinessDays[0]->id, $dataForUpdating['irregularBusinessDays'][0]['id']);
    $this->assertEquals($result->irregularBusinessDays[0]->date, $dataForUpdating['irregularBusinessDays'][0]['date']);
    // irregularBusinessDays[1]->idについては、新規作成のためidの検証はしておりません。
    $this->assertEquals($result->irregularBusinessDays[1]->date, $dataForUpdating['irregularBusinessDays'][1]['date']);

    // 更新内容がDBに存在することを確認
    $this->assertDatabaseHas('yard_groups', [
        'name' => $dataForUpdating['name'],
        'representative_yard_id' => $dataForUpdating['representativeYardId'],
        'reception_time_weekdays_from' => $dataForUpdating['receptionTimeWeekdaysFrom'],
        'reception_time_weekdays_to' => $dataForUpdating['receptionTimeWeekdaysTo'],
        'reception_time_saturday_from' => $dataForUpdating['receptionTimeSaturdayFrom'],
        'reception_time_saturday_to' => $dataForUpdating['receptionTimeSaturdayTo'],
        'rest_time_from' => $dataForUpdating['restTimeFrom'],
        'rest_time_to' => $dataForUpdating['restTimeTo'],
        'default_pol_id' => $dataForUpdating['defaultPolId']
    ]);

    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $dataForUpdating['managerIds'][0]]);
    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $dataForUpdating['managerIds'][1]]);
    $this->assertDatabaseHas('yard_group_manager', ['yard_group_id' => $result->id, 'user_id' => $dataForUpdating['managerIds'][2]]);

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

    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'start_date' => $dataForUpdating['regularHolidays'][0]['startDate']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'end_date' => $dataForUpdating['regularHolidays'][0]['endDate']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'monday_flg' => $dataForUpdating['regularHolidays'][0]['mondayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'tuesday_flg' => $dataForUpdating['regularHolidays'][0]['tuesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'wednesday_flg' => $dataForUpdating['regularHolidays'][0]['wednesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'thursday_flg' => $dataForUpdating['regularHolidays'][0]['thursdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'friday_flg' => $dataForUpdating['regularHolidays'][0]['fridayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'saturday_flg' => $dataForUpdating['regularHolidays'][0]['saturdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'sunday_flg' => $dataForUpdating['regularHolidays'][0]['sundayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'national_holidays_flg' => $dataForUpdating['regularHolidays'][0]['nationalHolidaysFlg']]);

    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'start_date' => $dataForUpdating['regularHolidays'][1]['startDate']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'end_date' => $dataForUpdating['regularHolidays'][1]['endDate']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'monday_flg' => $dataForUpdating['regularHolidays'][1]['mondayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'tuesday_flg' => $dataForUpdating['regularHolidays'][1]['tuesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'wednesday_flg' => $dataForUpdating['regularHolidays'][1]['wednesdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'thursday_flg' => $dataForUpdating['regularHolidays'][1]['thursdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'friday_flg' => $dataForUpdating['regularHolidays'][1]['fridayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'saturday_flg' => $dataForUpdating['regularHolidays'][1]['saturdayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'sunday_flg' => $dataForUpdating['regularHolidays'][1]['sundayFlg']]);
    $this->assertDatabaseHas('yard_group_regular_holidays', ['yard_group_id' => $result->id, 'national_holidays_flg' => $dataForUpdating['regularHolidays'][1]['nationalHolidaysFlg']]);

    $this->assertDatabaseHas('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $dataForUpdating['irregularHolidays'][0]['date']]);
    $this->assertDatabaseHas('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $dataForUpdating['irregularHolidays'][1]['date']]);
    // 更新時にId指定をされていないレコードは論理削除されていることを確認
    $this->assertSoftDeleted('yard_group_irregular_holidays', ['yard_group_id' => $result->id, 'date' => $yardGroupIrregularHolidays[1]->date]);

    $this->assertDatabaseHas('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $dataForUpdating['irregularBusinessDays'][0]['date']]);
    $this->assertDatabaseHas('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $dataForUpdating['irregularBusinessDays'][1]['date']]);
    // 更新時にId指定をされていないレコードは論理削除されていることを確認
    $this->assertSoftDeleted('yard_group_irregular_business_days', ['yard_group_id' => $result->id, 'date' => $yardGroupIrregularBusinessDays[1]->date]);
});
