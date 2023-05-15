<?php

use Services\SampleAlice\App\UseCases\GoodMorning;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $useCase = new GoodMorning();
    $useCase();

    $this->assertTrue(true);
});
