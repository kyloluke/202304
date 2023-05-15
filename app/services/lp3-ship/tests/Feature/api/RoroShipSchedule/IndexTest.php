<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('no roro-ship-schedule', function () {
    /** @var TestCase $this */
    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/roro');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all roro-ship-schedules', function () {
    /** @var TestCase $this */

    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    ShipSchedule::factory()->count(4)->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create(['ship_id' => $roroShip->id]);

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/roro');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});

it('get roro-ship-schedules with search parameter', function () {
    /** @var TestCase $this */
    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    ShipSchedule::factory()->count(4)->create(['type' => $roroShip->id]);  // paginate 利用の場合は、pageSize以下の件数を設定する

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/roro?shipID=&shipCompanyId=&polPortId=&podPortId=&voyageNumber=&cutAt=');
    $result->assertOk();

    // podPortIdが無効の場合、エラーが出る
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/roro?shipID=1&shipCompanyId=&polPortId=&podPortId=22222&voyageNumber=&cutAt=1');
    $result->assertJsonValidationErrors(['podPortId']);
});
