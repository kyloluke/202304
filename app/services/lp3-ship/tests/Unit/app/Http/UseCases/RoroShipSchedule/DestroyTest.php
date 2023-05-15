<?php

use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Destroy;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Enums\ShipType;
use Illuminate\Support\Arr;

it('deletes a roro-ship-schedule', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipSchedule = ShipSchedule::factory()->create(['ship_id' => $roroShip->id]);

    // ユースケース呼び出し
    $useCase = new Destroy();
    $result = $useCase($shipSchedule->id);
    $exceptArr = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    $resArr = Arr::except($result->toArray(), array_merge($exceptArr, ['ship', 'ship_company', 'schedule_items']));
    $tempArr = Arr::except($shipSchedule->toArray(), $exceptArr);
    $this->assertEquals($tempArr, $resArr);

    // 論理削除がされていることを確認
    $this->assertSoftDeleted($shipSchedule);
});
