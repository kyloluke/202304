<?php

use Services\Lp3Ship\App\Models\ShipSchedule;
use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\CheckUnique;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;
use Carbon\Carbon;
use Services\Lp3Ship\App\Enums\ShipType;

// return false 作成できない、パラメターの積み地出発予定日　は　最新揚げ地到着予定日より200日以内　「(polDepartureAt　- 200) <= DB.pod_arrival_at」
$checkData1 = [
    'type' => 1,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => 'No.33330',
        'polDepartureAt' => '20330305',
        'podArrivalAt' => '20330317'
    ]
];

// return false、作成できない、揚げ地到着予定日　は　最新積み地出発予定日まで200日以内　「(podArrivalAt + 200) >= DB.pol_departure_at」
$checkData2 = [
    'type' => 2,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => 'No.33331',
        'polDepartureAt' => '20330305',
        'podArrivalAt' => '20330317'
    ]
];

// return false、半分かぶる　作成できない　
$checkData3 = [
    'type' => 3,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => 'No.33332',
        'polDepartureAt' => '20330305',
        'podArrivalAt' => '20330317'
    ]
];

// return false、全期間かぶる　作成できない　
$checkData4 = [
    'type' => 4,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => 'No.33333',
        'polDepartureAt' => '20330305',
        'podArrivalAt' => '20330317'
    ]
];

$checkData5 = [
    'type' => 5,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => 'No.33334',
        'polDepartureAt' => '20330305',
        'podArrivalAt' => '20330317'
    ]
];

it('unique check answers true or false', function ($data) {
    /** @var TestCase $this */
    $ship = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipCompany = ShipCompany::factory()->create();
    $data['data']['shipId'] = $ship->id;
    $data['data']['shipCompanyId'] = $shipCompany->id;

    ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->count(3)->create();
    $shipSchedule = ShipSchedule::factory()
        ->has(ShipScheduleItem::factory()->count(3)->sequence(function ($seq) use ($data) {
            // 3件作成しておく
            if ($data['type'] == 1) {
                if ($seq->index == 0) {
                    return [
                        'pol_departure_at' => Carbon::parse($data['data']['podArrivalAt'])->subDays(230),
                        'pod_arrival_at' => Carbon::parse($data['data']['polDepartureAt'])->subDays(199), // ヒット
                    ];
                }
            } elseif ($data['type'] == 2) {
                if ($seq->index == 1) {
                    return [
                        'pol_departure_at' => Carbon::parse($data['data']['podArrivalAt'])->addDays(199), // ヒット
                        'pod_arrival_at' => Carbon::parse($data['data']['polDepartureAt'])->addDays(230),
                    ];
                }
            } elseif ($data['type'] == 3) {
                if ($seq->index == 2) {
                    return [
                        'pol_departure_at' => Carbon::parse($data['data']['polDepartureAt'])->addDays(33), // 出発かぶる
                        'pod_arrival_at' => Carbon::parse($data['data']['podArrivalAt'])->subDays(250),
                    ];
                }
            } elseif ($data['type'] == 4) {
                if ($seq->index == 2) {
                    return [
                        'pol_departure_at' => Carbon::parse($data['data']['polDepartureAt'])->subDays(10), // 全期間かぶる
                        'pod_arrival_at' => Carbon::parse($data['data']['podArrivalAt'])->addDays(10),
                    ];
                }
            }
            return [];//　ファクトリーデフォルト値利用する
        }), 'scheduleItems')
        ->create([
            'ship_id' => $ship->id,
            'ship_company_id' => $shipCompany->id,
            'voyage_number' => $data['data']['voyageNumber'],
        ]);

    $useCase = new CheckUnique;
    $resData = $useCase($data['data']);

    if ($data['type'] == 1) {
        $this->assertEquals($resData, false);
    } elseif ($data['type'] == 2) {
        $this->assertEquals($resData, false);
    } elseif ($data['type'] == 3) {
        $this->assertEquals($resData, false);
    } elseif ($data['type'] == 4) {
        $this->assertEquals($resData, false);
    } else {
        // 作成できる
        $this->assertEquals($resData, true);
    }
})->with([
    [$checkData1],
    [$checkData2],
    [$checkData3],
    [$checkData4],
    [$checkData5]
]);
