<?php

use Services\Lp3Core\App\Http\UseCases\Port\Show;
use Services\Lp3Core\App\Models\Port;
use Tests\TestCase;

it('gets a port', function () {
    /** @var TestCase $this */

    $port = Port::factory()->create();
    $useCase = new Show();
    $resData = $useCase($port->id);
    $this->assertEquals($port->name, $resData->name);
    $this->assertEquals($port->country_id, $resData->country_id);
    $this->assertEquals($port->type, $resData->type);
});
