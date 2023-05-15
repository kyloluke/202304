<?php

use Tests\TestCase;

it('validate_errors', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-sales/account-title')
        ->assertJsonValidationErrors(['name','name_en','code','available', 'ordinary']);
});

it('created', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-sales/account-title',[
            'name' => 'テスト',
            'name_en' => 'test',
            'code' => '1001',
            'available' => true,
            'ordinary' => '0',
        ])
        ->assertCreated();
});
