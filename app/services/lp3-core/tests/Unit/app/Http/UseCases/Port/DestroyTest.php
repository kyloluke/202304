<?php

use Services\Lp3Core\App\Http\UseCases\Port\Destroy;
use Services\Lp3Core\App\Models\Port;
use Tests\TestCase;

it('deletes a port', function () {
    /** @var TestCase $this */
    $port = Port::factory()->create();
    $useCase = new Destroy();
    $result = $useCase($port->id);
    $this->assertEquals($port->name, $result->name);
    $this->assertEquals($port->country_id, $result->country_id);
    $this->assertEquals($port->type, $result->type);
    $this->assertSoftDeleted($port);
});
