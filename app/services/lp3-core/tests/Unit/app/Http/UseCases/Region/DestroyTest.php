<?php

use Services\Lp3Core\App\Http\UseCases\Region\Destroy;
use Services\Lp3Core\App\Models\Region;
use Tests\TestCase;

it('deletes a region', function () {
    /** @var TestCase $this */
    $region = Region::factory()->create();
    $useCase = new Destroy();
    $result = $useCase($region->id);
    $this->assertEquals($region->name, $result->name);
    $this->assertSoftDeleted($region);
});
