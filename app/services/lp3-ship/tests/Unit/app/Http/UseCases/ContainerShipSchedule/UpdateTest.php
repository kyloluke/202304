<?php

use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Update;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Ship\App\Enums\ShipType;

it('update a container-ship-schedule', function () {
    /** @var TestCase $this */

    // 編集用データ　start

    $ports = Port::factory()->count(4)->sequence(
        ['name' => 'テスト積港1', 'type' => PortType::POL->value],
        ['name' => 'テスト積港2', 'type' => PortType::POL->value],
        ['name' => 'テスト揚港1', 'type' => PortType::POD->value],
        ['name' => 'テスト揚港2', 'type' => PortType::POD->value],
    )->create();

    $contShip = Ship::factory()->create(['type' => ShipType::CONTAINER_SHIP->value]);
    $shipCompany = ShipCompany::factory()->create();

    $fd = Destination::factory()->create();
    // 登録用データ作成
    $data = [
        'shipId' => $contShip->id,
        'shipCompanyId' => $shipCompany->id,
        'voyageNumber' => '航海番号XGGDF432432432',
        'remarks' => 'test remarks content',
        'referUrl' => 'https://forxzample.com',
        'scheduleItems' => [
            [
                'polPortId' => $ports[0]->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $ports[2]->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => false,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => null,
                'goDownZipCode' => null,
                'goDownAddress' => null
            ],
            [
                'polPortId' => $ports[0]->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $ports[3]->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => false,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => null,
                'goDownZipCode' => null,
                'goDownAddress' => null
            ],
            [
                'polPortId' => $ports[1]->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $ports[2]->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => false,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => null,
                'goDownZipCode' => null,
                'goDownAddress' => null
            ],
            [
                'polPortId' => $ports[1]->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $ports[3]->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => false,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => null,
                'goDownZipCode' => null,
                'goDownAddress' => null
            ]
        ]
    ];
    // 編集用データ　end
    $shipSchedule = ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create(['ship_id' => $contShip->id]);

    // ユースケース呼び出し
    $useCase = new Update();
    $resArr = $useCase($shipSchedule->id, $data)->toArray();

    $tempArr = [];
    foreach ($data as $key => $val) {
        if ($key == 'scheduleItems') {
            $tempArr['schedule_items'] = [];
            foreach ($data['scheduleItems'] as $i => $k) {
                $tempArr['schedule_items'][$i] = [];
                foreach ($k as $m => $n) {
                    $tempArr['schedule_items'][$i][Str::snake($m)] = $n;
                }
            }
        } else {
            $tempArr[Str::snake($key)] = $val;
        }
    }
    $exceptArr = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];
    $resArr = Arr::except($resArr, array_merge($exceptArr, ['ship', 'ship_company', 'type']));
    foreach ($resArr['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals($tempArr, $resArr);
});
