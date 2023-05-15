<?php

use Services\Lp3Core\App\Http\UseCases\Destination\Destroy;
use Tests\TestCase;
use Services\Lp3Core\App\Models\Destination;

it('deletes a destination', function () {
    /** @var TestCase $this */
    $destination = Destination::factory()->create();
    $useCase = new Destroy();
    $result = $useCase($destination->id);
    $this->assertEquals($destination->name, $result->name);
    $this->assertEquals($destination->country_id, $result->country_id);
    $this->assertEquals($destination->location_type, $result->location_type);

    $this->assertSoftDeleted($destination);
});
