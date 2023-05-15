<?php

use Services\Lp3Core\App\Http\UseCases\Region\Update;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('update a region', function () {
    /** @var TestCase $this */

    $data = [
        'name' => "地域名称が更新しました、＄％％＆”＃",
    ];
    $region = Region::factory()->create();
    $useCase = new Update();
    $result = $useCase($region->id, $data);
    $this->assertEquals($result->name, $data['name']);
});
