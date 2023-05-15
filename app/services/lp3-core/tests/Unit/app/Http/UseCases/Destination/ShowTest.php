<?php

use Services\Lp3Core\App\Http\UseCases\Destination\Show;
use Services\Lp3Core\App\Models\Destination;
use Tests\TestCase;

it('gets a destination', function () {
    /** @var TestCase $this */

    $destination = Destination::factory()->create();
    $useCase = new Show();
    $resData = $useCase($destination->id);
    $this->assertEquals($destination->name, $resData->name);
    $this->assertEquals($destination->country_id, $resData->country_id);
    $this->assertEquals($destination->location_type, $resData->location_type);
});
