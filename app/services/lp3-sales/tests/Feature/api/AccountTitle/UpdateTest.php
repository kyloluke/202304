<?php

use Tests\TestCase;
use Services\Lp3Sales\App\Models\AccountTitle;

it('validate_errors', function () {
    /** @var TestCase $this */

    $accountTitle = AccountTitle::factory()->create();
    $id = $accountTitle->id;

    $this
        ->json('put', 'api/lp3-sales/account-title/' . $id)
        ->assertJsonValidationErrors(['name','name_en','code','available', 'ordinary']);
});

it('updated', function () {
    /** @var TestCase $this */

    $accountTitle = AccountTitle::factory()->create();

    $id = $accountTitle->id;

    $this
        ->json('put', 'api/lp3-sales/account-title/' . $id,[
            'name' => 'テスト',
            'name_en' => 'test',
            'code' => '1001',
            'available' => true,
            'ordinary' => '0',
        ])
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    AccountTitle::truncate();

    $this
        ->json('put', 'api/lp3-sales/account-title/1',[
            'name' => 'テスト',
            'name_en' => 'test',
            'code' => '1001',
            'available' => true,
            'ordinary' => '0',
        ])
        ->assertNotFound();
});
