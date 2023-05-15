<?php

use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-core/inspection-type/bulk/csv/download')
        ->assertOk();
});
