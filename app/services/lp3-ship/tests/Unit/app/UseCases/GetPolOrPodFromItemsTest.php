<?php

use Tests\TestCase;
use Services\Lp3Ship\App\UseCases\GetPolOrPodFromItems;

// 最低値取得する
$data1 = [
    'type' => 1,
    'origin' => 2,
    'dataArr' => [
        ['minNumber' => 23, 'maxNumber' => 35],
        ['minNumber' => 45, 'maxNumber' => 55],
        ['minNumber' => 15, 'maxNumber' => 66],
        ['minNumber' => 12, 'maxNumber' => 47],
        ['minNumber' => 2, 'maxNumber' => 85]
    ]
];
// 最大値取得する
$data2 = [
    'type' => 2,
    'origin' => 85,
    'dataArr' => [
        ['minNumber' => 23, 'maxNumber' => 35],
        ['minNumber' => 45, 'maxNumber' => 55],
        ['minNumber' => 15, 'maxNumber' => 66],
        ['minNumber' => 12, 'maxNumber' => 47],
        ['minNumber' => 23, 'maxNumber' => 85]
    ]
];
// もっとも古い日時取得
$data3 = [
    'type' => 3,
    'origin' => '1661-01-01 12:12:12',
    'dataArr' => [
        ['minDate' => '1955-03-03 20:20:20', 'maxDate' => '1898-03-11 20:20:20'],
        ['minDate' => '1717-5-03 20:20:20', 'maxDate' => '1813-03-08 20:20:20'],
        ['minDate' => '2016-07-03 20:20:20', 'maxDate' => '2017-03-03'],
        ['minDate' => '1661-01-01 12:12:12', 'maxDate' => '2013-03-06 20:20:20'],
        ['minDate' => '2021-03-03 20:20:20', 'maxDate' => '2033-03-03 20:20:20']
    ]
];
// 最も新しい日時を取得
$data4 = [
    'type' => 4,
    'origin' => '2033-03-03 20:20:20',
    'dataArr' => [
        ['minDate' => '1955-03-03 20:20:20', 'maxDate' => '1898-03-11 20:20:20'],
        ['minDate' => '1717-5-03 20:20:20', 'maxDate' => '1813-03-08 20:20:20'],
        ['minDate' => '2016-07-03 20:20:20', 'maxDate' => '2017-03-03'],
        ['minDate' => '2012-12-03 20:20:20', 'maxDate' => '2013-03-06 20:20:20'],
        ['minDate' => '2021-03-03 20:20:20', 'maxDate' => '2033-03-03 20:20:20']
    ]
];

// もっとも古い日時取得
$data5 = [
    'type' => 5,
    'origin' => '1955-03-03 20:20',
    'dataArr' => [
        ['minDate' => '1955-03-03 20:20', 'maxDate' => '1898-03-11 20:20:20'],
        ['minDate' => null, 'maxDate' => '1813-03-08 20:20:20'],
        ['maxDate' => '2017-03-03'], // minDate 存在しないケース
        ['minDate' => '2012-12-03 20:20:20', 'maxDate' => '2013-03-06 20:20:20'],
        ['minDate' => '2021-03-03 20:20:20', 'maxDate' => '2033-03-03 20:20:20']
    ]
];

// 最低値取得する
it('', function ($data) {
    /** @var TestCase $this */
    $useCase = new GetPolOrPodFromItems;
    $res = null;
    switch ($data['type']) {
        case 1:
            $res = $useCase($data['dataArr'], 'minNumber');
            break;
        case 2:
            $res = $useCase($data['dataArr'], 'maxNumber', 'desc');
            break;
        case 3:
            $res = $useCase($data['dataArr'], 'minDate');
            break;
        case 4:
            $res = $useCase($data['dataArr'], 'maxDate', 'desc');
            break;
        case 5:
            $res = $useCase($data['dataArr'], 'minDate');
    }

    $this->assertEquals($data['origin'], $res);

})->with([
    [$data1],
    [$data2],
    [$data3],
    [$data4],
    [$data5],
]);
