<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\Store;
use Tests\TestCase;

it('creates a inspection-type', function () {
    /** @var TestCase $this */

    $data = [
        'name' => 'テスト検査種別　"&=#66',
    ];

    $useCase = new Store();
    $resData = $useCase($data)->toArray();
    $this->assertEquals($data['name'], $resData['name']);
});
