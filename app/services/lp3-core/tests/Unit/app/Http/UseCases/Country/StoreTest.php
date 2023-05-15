<?php

use Services\Lp3Core\App\Http\UseCases\Country\Store;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('creates a county', function () {
    /** @var TestCase $this */

    $resgion = Region::factory()->create();
    $data = [
        'name' => 'テスト国 #66',
        'regionId' => $resgion->id
    ];

    $useCase = new Store();
    $resData = $useCase($data)->toArray();

    $this->assertEquals($data['name'], $resData['name']);
    $this->assertEquals($data['regionId'], $resData['region_id']);
});
