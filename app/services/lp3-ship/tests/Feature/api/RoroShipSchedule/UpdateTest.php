<?php

use Tests\TestCase;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Illuminate\Support\Arr;
use Services\Lp3Ship\Refers\Models\Port;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Ship\Refers\Models\Destination;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Ship\App\Enums\ShipType;

// 必須チェック データ
$data1 = [
    'type' => 1,
    'data' => [
        'shipId' => '',
        'shipCompanyId' => '',
        'voyageNumber' => '',
        'remarks' => '',
        'referUrl' => '',
        'scheduleItems' => [
            [
                'polPortId' => '',
                'polArrivalAt' => '',
                'polArrivedAt' => '',
                'polDepartureAt' => '',
                'polDepartedAt' => '',
                'podPortId' => '',
                'podArrivalAt' => '',
                'podArrivedAt' => '',
                'documentCutAt' => '',
                'documentAmCut' => '',
                'cyOpenAt' => null,
                'cyCutAt' => null,
                'cyAmCut' => null,
                'remarks' => '',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => '',
                'fdArrivalAt' => '',
                'fdArrivedAt' => '',
                'goDownAt' => '',
                'goDownZipCode' => '',
                'goDownAddress' => ''
            ]
        ]
    ]
];

// タイプ チェック　データ
$data2 = [
    'type' => 2,
    'data' => [
        'shipId' => 'ship id',
        'shipCompanyId' => 'ship company id',
        'voyageNumber' => 'string is correct',
        'remarks' => 'string is correct, 最大10000まで',
        'referUrl' => 'url じゃない、エラーが出る',
        'scheduleItems' => [
            [
                'polPortId' => 'ここは有効なport_idを求める',
                'polArrivalAt' => '20200202 22:11',
                'polArrivedAt' => '2020-02-02',
                'polDepartureAt' => '202002', // エラー
                'polDepartedAt' => '2020-02-02 12:34',
                'podPortId' => '',
                'podArrivalAt' => '2020-02-02 12:34:34',
                'podArrivedAt' => '2020-02-02 12', // エラー
                'documentCutAt' => '',
                'documentAmCut' => '',
                'cyOpenAt' => '',
                'cyCutAt' => '',
                'cyAmCut' => 'エラー出る',
                'remarks' => '',
                'irregularCyCut' => 'エラー出る',
                'available' => 'エラー出る',
                'fdId' => '',
                'fdArrivalAt' => '',
                'fdArrivedAt' => '',
                'goDownAt' => '2020-02-02 12:34:34',
                'goDownZipCode' => '120 0000',
                'goDownAddress' => 'xxx県xxx市xxx町xxx村'
            ]
        ]
    ]
];

// 無効　チェック
$data3 = [
    'type' => 3,
    'data' => [
        'shipId' => 10000,// エラー
        'shipCompanyId' => 10000,// エラー
        'voyageNumber' => 'string is correct',
        'remarks' => 'string is correct, 最大10000まで',
        'referUrl' => 'https://test-referurl.com',
        'scheduleItems' => [
            [
                'polPortId' => 1111,// エラー
                'polArrivalAt' => '20200202 22:11',
                'polArrivedAt' => '2020-02-02',
                'polDepartureAt' => '202002 34:33:33',
                'polDepartedAt' => '2020-02-02 12:34',
                'podPortId' => 1111,
                'podArrivalAt' => '2020-02-02 12:34:34',
                'podArrivedAt' => '2020-02-02',
                'documentCutAt' => '',
                'documentAmCut' => true,
                'cyOpenAt' => '',
                'cyCutAt' => '',
                'cyAmCut' => false,
                'remarks' => '',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => 1111,// エラー
                'fdArrivalAt' => '',
                'fdArrivedAt' => '',
                'goDownAt' => '2020-02-02 12:34:34',
                'goDownZipCode' => '120 0000',
                'goDownAddress' => 'xxx県xxx市xxx町xxx村'
            ]
        ]
    ]
];

it('validation will be failed', function ($data) {

    $type = $data['type'];
    $reqData = $data['data'];

    switch ($type) {
        case 1:
            $res = $this->json('post', 'api/lp3-ship/ship-schedule/roro', $reqData);
            $res->assertJsonValidationErrors(['shipId', 'shipCompanyId', 'scheduleItems.0.polPortId', 'scheduleItems.0.podPortId']);
            break;
        case 2:
            $res = $this->json('post', 'api/lp3-ship/ship-schedule/roro', $reqData);
            $res->assertJsonValidationErrors([
                'shipId', 'shipCompanyId', 'referUrl',
                'scheduleItems.0.polPortId', 'scheduleItems.0.polDepartureAt',
                'scheduleItems.0.podPortId', 'scheduleItems.0.podArrivedAt',
                'scheduleItems.0.irregularCyCut', 'scheduleItems.0.available'
            ]);
            break;
        case 3:
            $res = $this->json('post', 'api/lp3-ship/ship-schedule/roro', $reqData);
            $res->assertJsonValidationErrors(['shipId', 'shipCompanyId', 'scheduleItems.0.polPortId', 'scheduleItems.0.podPortId', 'scheduleItems.0.fdId']);
            break;

        default:
    }

})->with([
    [$data1],
    [$data2],
    [$data3]
]);


// resource not be found
it('no data', function () {
    /** @var TestCase $this */
    $polPortArr = [
        'name' => 'テスト積港1',
        'type' => PortType::POL->value
    ];

    $podPortArr = [
        'name' => 'テスト揚港1',
        'type' => PortType::POD->value
    ];

    $polPort = Port::factory()->create($polPortArr);
    $podPort = Port::factory()->create($podPortArr);

    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipCompany = ShipCompany::factory()->create();

    $fd = Destination::factory()->create();

    // 更新内容作成
    $dataForUpdating = [
        // 更新データを用意する
        'shipId' => $roroShip->id,
        'shipCompanyId' => $shipCompany->id,
        'voyageNumber' => '航海番号XGGDF432432432',
        'remarks' => 'test remarks content',
        'referUrl' => 'https://forxzample.com',
        'scheduleItems' => [
            [
                'polPortId' => $polPort->id,
                'polArrivalAt' => '2023-06-06 12:33:00',
                'polArrivedAt' => '2023-06-06 12:33:00',
                'polDepartureAt' => '2023-06-06 12:33:00',
                'polDepartedAt' => '2023-06-06 12:33:00',
                'podPortId' => $podPort->id,
                'podArrivalAt' => '2023-06-06 12:33:00',
                'podArrivedAt' => '2023-06-06 12:33:00',
                'documentCutAt' => '2023-06-06 12:33:00',
                'documentAmCut' => false,
                'cyOpenAt' => null,
                'cyCutAt' => null,
                'cyAmCut' => null,
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => '2020-02-02 12:34:34',
                'goDownZipCode' => '120 0000',
                'goDownAddress' => 'xxx県xxx市xxx町xxx村'
            ]
        ]
    ];

    // api call
    $result = $this->json('put', 'api/lp3-ship/ship-schedule/roro/100000', $dataForUpdating);

    $result->assertNotFound();
});

// 本船スケジュールを更新する
it('updates a ship-schedule', function () {
    /** @var TestCase $this */

    $polPortArr1 = [
        'name' => 'テスト積港1',
        'type' => PortType::POL->value
    ];

    $podPortArr1 = [
        'name' => 'テスト揚港1',
        'type' => PortType::POD->value
    ];

    $podPortArr2 = [
        'name' => 'テスト揚港2',
        'type' => PortType::POD->value
    ];

    $polPort1 = Port::factory()->create($polPortArr1);
    $podPort1 = Port::factory()->create($podPortArr1);
    $podPort2 = Port::factory()->create($podPortArr2);

    $roroShip = Ship::factory()->create(['type' => ShipType::RORO_SHIP->value]);
    $shipCompany = ShipCompany::factory()->create();

    $fd = Destination::factory()->create();

    // 更新データを用意する
    $reqData = [
        'shipId' => $roroShip->id,
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
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => '2020-02-02 12:34:34',
                'goDownZipCode' => '120 0000',
                'goDownAddress' => 'xxx県xxx市xxx町xxx村'
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
                'remarks' => '2023-06-06 12:33:00',
                'irregularCyCut' => false,
                'available' => true,
                'fdId' => $fd->id,
                'fdArrivalAt' => '2023-06-06 12:33:00',
                'fdArrivedAt' => '2023-06-06 12:33:00',
                'goDownAt' => '2020-02-02 12:34:34',
                'goDownZipCode' => '120 0000',
                'goDownAddress' => 'xxx県xxx市xxx町xxx村'
            ]
        ]
    ];

    // 更新ターゲットを作成おく
    $shipSchedule = ShipSchedule::factory()->has(ShipScheduleItem::factory()->count(3), 'scheduleItems')->create();
    // api call
    $result = $this->json('put', 'api/lp3-ship/ship-schedule/roro/' . $shipSchedule->id, $reqData);

    // レスポンスが正常に返ってくることを確認
    $result->assertOk();

    // 登録されたデータが正しいか確認
    $resultData = json_decode($result->content(), true)['data'];

    $resData = Arr::except($resultData, ['id', 'createdBy', 'updatedBy', 'deletedBy', 'createdAt', 'updatedAt', 'deletedAt', 'ship', 'shipCompany', 'type']);

    foreach ($resData['scheduleItems'] as &$val) {
        $val = Arr::except($val, ['shipScheduleId', 'createdBy', 'createdAt', 'updatedBy', 'updatedAt', 'deletedBy', 'deletedAt', 'id', 'polPort', 'podPort', 'destination']);
    }

    $this->assertEquals(Arr::sort($resData), Arr::sort($reqData));
});

