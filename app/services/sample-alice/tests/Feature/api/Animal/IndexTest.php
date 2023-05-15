<?php

use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $this
        ->json('get', 'api/sample-alice/animal')
        ->assertOk();
});
