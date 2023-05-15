<?php

use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-cargo/car-brand/bulk/csv/download')
        ->assertOk();
});
