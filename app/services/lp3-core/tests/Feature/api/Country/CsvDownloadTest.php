<?php

use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-core/country/bulk/csv/download')
        ->assertOk();
});
