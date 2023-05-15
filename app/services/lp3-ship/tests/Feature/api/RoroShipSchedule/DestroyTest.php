<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('deletes a roro-ship-schedule', function () {
    /** @var TestCase $this */

    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipSchedule = ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create(['ship_id' => $roroShip->id]);

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-schedule/roro/' . $shipSchedule->id);
    $result->assertOk();
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/roro/' . $shipSchedule->id);
    $result->assertNotFound();
});

it('no data', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('delete', 'api/lp3-ship/ship-schedule/roro/111111');
    $result->assertNotFound();
});
