<?php

use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $this
        ->json('get', 'api/lp3-sales/account-title')
        ->assertOk();
});
