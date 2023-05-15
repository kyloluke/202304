<?php

use Tests\TestCase;

it('validate_errors', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-cargo/car-brand')
        ->assertJsonValidationErrors(['name','nameEn']);
});

it('created', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-cargo/car-brand',[
            'name' => 'テスト',
            'nameEn' => 'test',
        ])
        ->assertCreated();
});
