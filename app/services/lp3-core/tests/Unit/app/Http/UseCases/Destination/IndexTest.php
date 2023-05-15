<?php

use Services\Lp3Core\App\Http\UseCases\Destination\Index;
use Services\Lp3Core\App\Models\Destination;
use Tests\TestCase;

it('gets all destinations', function () {
    /** @var TestCase $this */

    $destination_1 = Destination::factory()->create();
    $destination_2 = Destination::factory()->create();

    $useCase = new Index();
    $data = [];
    $resData = $useCase($data);

    $this->assertEquals($resData->count(), 2);
    $this->assertEquals($destination_1->name, $resData[0]->name);
    $this->assertEquals($destination_1->country_id, $resData[0]->country_id);
    $this->assertEquals($destination_1->location_type, $resData[0]->location_type);

    $this->assertEquals($destination_2->name, $resData[1]->name);
    $this->assertEquals($destination_2->country_id, $resData[1]->country_id);
    $this->assertEquals($destination_2->location_type, $resData[1]->location_type);
});
