<?php

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Show;
use Services\Lp3Sales\App\Models\AccountTitle;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $accountTitle1 = AccountTitle::factory()->create();

    $useCase = new Show();
    $result = $useCase($accountTitle1->id);

    $this->assertEquals($result->name,$accountTitle1->name);
});
