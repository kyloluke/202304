<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('deletes a container-ship-schedule', function () {
    /** @var TestCase $this */

    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    $shipSchedule = ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create(['ship_id' => $contShip->id]);

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-schedule/cont/' . $shipSchedule->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont/' . $shipSchedule->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-schedule/cont/111111');
    $result->assertNotFound();
});
