<?php

use Services\SampleAlice\App\Http\UseCases\Animal\Index;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $useCase = new Index();
    $useCase();

    $this->assertTrue(true);
});
