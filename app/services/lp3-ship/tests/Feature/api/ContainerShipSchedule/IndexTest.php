<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('no container-ship-schedule', function () {
    /** @var TestCase $this */
    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont');
    $result->assertOk();
    $result->assertJsonCount(0, 'data');
});

it('get all container-ship-schedules', function () {
    /** @var TestCase $this */
    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    ShipSchedule::factory()->count(4)->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create(['ship_id' => $contShip->id]);

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont');
    $result->assertOk();
    $result->assertJsonCount(4, 'data');
});

it('get container-ship-schedules with search parameter', function () {
    /** @var TestCase $this */
    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    ShipSchedule::factory()->count(4)->create(['ship_id' => $contShip->id]);  // paginate 利用の場合は、pageSize以下の件数を設定する

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont?shipID=&shipCompanyId=&polPortId=&podPortId=&voyageNumber=&cutAt=');
    $result->assertOk();

    // podPortIdが無効の場合、エラーが出る
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont?shipID=1&shipCompanyId=&polPortId=&podPortId=22222&voyageNumber=&cutAt=');
    $result->assertJsonValidationErrors(['podPortId']);
});
