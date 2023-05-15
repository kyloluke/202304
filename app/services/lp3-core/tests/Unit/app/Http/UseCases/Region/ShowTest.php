<?php

use Services\Lp3Core\App\Http\UseCases\Region\Show;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('gets a region', function () {
    /** @var TestCase $this */

    $region = Region::factory()->create();
    $useCase = new Show();
    $resData = $useCase($region->id);
    $this->assertEquals($region->name, $resData->name);
});
