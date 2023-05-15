<?php

use Services\Lp3Core\App\Http\UseCases\Port\Index;
use Services\Lp3Core\App\Models\Port;
use Tests\TestCase;

it('gets all ports', function () {
    /** @var TestCase $this */

    $port_1 = Port::factory()->create();
    $port_2 = Port::factory()->create();

    $useCase = new Index();
    $data = [];
    $resData = $useCase($data);

    $this->assertEquals($resData->count(), 2);
    $this->assertEquals($port_1->name, $resData[0]->name);
    $this->assertEquals($port_1->country_id, $resData[0]->country_id);
    $this->assertEquals($port_1->type, $resData[0]->type);

    $this->assertEquals($port_2->name, $resData[1]->name);
    $this->assertEquals($port_2->country_id, $resData[1]->country_id);
    $this->assertEquals($port_2->type, $resData[1]->type);
});
