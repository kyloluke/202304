<?php

use Tests\TestCase;
use Illuminate\Support\Arr;
use Services\Lp3Core\App\Models\Port;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Core\App\Models\Destination;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Store;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Ship\App\Enums\ShipType;

it('creates a container-ship-schedule', function () {
    /** @var TestCase $this */

    $polPortArr1 = [
        'name' => 'テスト積港1',
        'type' => PortType::POL->value
    ];

    $podPortArr1 = [
        'name' => 'テスト揚港1',
        'type' => PortType::POD->value
    ];
    $polPortArr2 = [
        'name' => 'テスト積港2',
        'type' => PortType::POL->value
    ];

    $podPortArr2 = [
        'name' => 'テスト揚港2',
        'type' => PortType::POD->value
    ];

    $polPort1 = Port::factory()->create($polPortArr1);
    $polPort2 = Port::factory()->create($polPortArr2);
    $podPort1 = Port::factory()->create($podPortArr1);
    $podPort2 = Port::factory()->create($podPortArr2);

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
                'polPortId' => $polPort1->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $podPort1->id,
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
                'go_down_at' => null,
                'go_down_zip_code' => null,
                'go_down_address' => null
            ],
            [
                'polPortId' => $polPort1->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $podPort2->id,
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
                'go_down_at' => null,
                'go_down_zip_code' => null,
                'go_down_address' => null
            ],
            [
                'polPortId' => $polPort2->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $podPort1->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => true,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'go_down_at' => null,
                'go_down_zip_code' => null,
                'go_down_address' => null
            ],
            [
                'polPortId' => $polPort2->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $podPort2->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => '2023-06-06 12:33:00',
                'cyCutAt' => '2023-06-06 12:33:00',
                'cyAmCut' => true,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'go_down_at' => null,
                'go_down_zip_code' => null,
                'go_down_address' => null
            ]
        ]
    ];

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

    // ユースケース呼び出し
    $useCase = new Store();
    $resArr = $useCase($data)->toArray();

    $exceptArr = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    $resArr = Arr::except($resArr, array_merge($exceptArr, ['ship', 'ship_company', 'type']));
    foreach ($resArr['schedule_items'] as &$val) {
        $val = Arr::except($val, array_merge($exceptArr, ['ship_schedule_id', 'pol_port', 'pod_port', 'destination']));
    }

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals(Arr::sort($tempArr), Arr::sort($resArr));
});
