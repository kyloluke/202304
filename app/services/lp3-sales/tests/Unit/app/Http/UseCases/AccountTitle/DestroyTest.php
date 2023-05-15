<?php

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Destroy;
use Services\Lp3Sales\App\Models\AccountTitle;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    AccountTitle::truncate();

    $accountTitle = AccountTitle::factory()->create();

    $useCase = new Destroy();
    $result = $useCase($accountTitle->id);

    $this->assertEmpty($result);

    $this->assertSoftDeleted($accountTitle);
});
