<?php

use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Show;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Illuminate\Support\Arr;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;

it('gets a roro-ship-schedule', function () {
    /** @var TestCase $this */
    // テストデータ作成
    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipSchedule = ShipSchedule::factory()
        ->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')
        ->create(['ship_id' => $roroShip->id])
        ->load('scheduleItems');

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($shipSchedule->id);

    $exceptArr = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];
    $resArr = Arr::except($result->toArray(), array_merge($exceptArr, ['ship', 'ship_company']));
    foreach ($resArr['schedule_items'] as &$item) {
        $item = Arr::except($item, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }
    $tempArr = Arr::except($shipSchedule->toArray(), $exceptArr);
    foreach ($tempArr['schedule_items'] as &$item) {
        $item = Arr::except($item, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }
    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($tempArr, $resArr);
});
