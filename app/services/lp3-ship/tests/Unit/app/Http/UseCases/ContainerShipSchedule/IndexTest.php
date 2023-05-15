<?php

use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Index;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use \Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Models\Ship;
use Illuminate\Support\Arr;

it('gets all container-ship-schedules', function () {
    /** @var TestCase $this */

    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    $shipSchedules = ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->count(2)->create(['ship_id' => $contShip->id]);

    // ユースケース呼び出し
    $data = [];
    $useCase = new Index();
    $result = $useCase($data);

    // 取得件数が2件であることを確認
    $this->assertEquals($result->count(), 2);

    $exceptArr = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];
    // 取得内容と作成したテストデータが一致していることを確認
    $tempArr1 = Arr::except($shipSchedules[0]->load(['scheduleItems'])->toArray(), $exceptArr);
    foreach ($tempArr1['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id']));
    }
    $tempArr2 = Arr::except($shipSchedules[1]->load(['scheduleItems'])->toArray(), $exceptArr);
    foreach ($tempArr2['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id']));
    }

    $resArr1 = Arr::except($result[0]->toArray(), array_merge($exceptArr, ['ship', 'ship_company']));
    foreach ($resArr1['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }
    $resArr2 = Arr::except($result[1]->toArray(), array_merge($exceptArr, ['ship', 'ship_company']));
    foreach ($resArr2['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }

    $this->assertEquals($resArr1, $tempArr1);
    $this->assertEquals($resArr2, $tempArr2);
});
