<?php

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Index;
use Services\Lp3Sales\App\Models\AccountTitle;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    AccountTitle::truncate();

    $accountTitle1 = AccountTitle::factory()->create();
    $accountTitle2 = AccountTitle::factory()->create();

    $useCase = new Index();
    $result = $useCase();

    $this->assertEquals($result->count(),2);
    $this->assertEquals($result[0]->name,$accountTitle1->name);
    $this->assertEquals($result[1]->name,$accountTitle2->name);
});
