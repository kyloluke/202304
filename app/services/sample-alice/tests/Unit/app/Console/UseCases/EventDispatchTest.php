<?php

use Services\SampleAlice\App\Console\UseCases\EventDispatch;
use Services\SampleAlice\App\Services\EventDispatch\EventDispatchServiceApp;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $useCase = new EventDispatch(new EventDispatchServiceApp());
    $useCase();

    $this->assertTrue(true);
});
