<?php

use Tests\TestCase;
use Services\Lp3Sales\App\Models\AccountTitle;

it('smoke', function () {
    /** @var TestCase $this */

    $accountTitle = AccountTitle::factory()->create();

    $id = $accountTitle->id;

    $this
        ->json('delete', 'api/lp3-sales/account-title/' . $id)
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    AccountTitle::truncate();

    $this
        ->json('delete', 'api/lp3-sales/account-title/1')
        ->assertNotFound();
});
