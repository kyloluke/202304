<?php

use Services\SampleAlice\App\Console\UseCases\Hello;
use Services\SampleAlice\App\UseCases\GoodMorning;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $useCase = new Hello();
    $useCase();

    $this->assertTrue(true);
});
