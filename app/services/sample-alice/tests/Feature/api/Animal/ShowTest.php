<?php

use Services\SampleAlice\App\Models\Animal;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $id = 1;

    Animal::factory()->create(['id' => $id]);

    $this
        ->json('get', 'api/sample-alice/animal/' . $id)
        ->assertOk();
});
