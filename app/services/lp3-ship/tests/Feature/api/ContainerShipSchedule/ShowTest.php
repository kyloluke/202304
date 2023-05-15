<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('data not be found', function () {
    /** @var TestCase $this */

    // api call
    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont/100');

    // 対象の本船情報がないことを確認
    $result->assertNotFound();
});

it('get a container-ship-schedule by id', function () {
    /** @var TestCase $this */

    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    $shipSchedule = ShipSchedule::factory()
        ->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')
        ->create(['refer_url' => '111111', 'voyage_number' => 'dfafdfaf', 'ship_id' => $contShip->id]);

    $result = $this->json('get', 'api/lp3-ship/ship-schedule/cont/' . $shipSchedule->id);
    $result->assertOk();
    $resData = json_decode($result->content(), true)['data'];

    $this->assertEquals($resData['referUrl'], $shipSchedule->refer_url);
    $this->assertEquals($resData['voyageNumber'], $shipSchedule->voyage_number);
});
