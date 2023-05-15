<?php

use Services\SampleAlice\App\Services\SampleAliceServiceMock;
use Services\SampleBob\App\Console\UseCases\UseExportedService;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $useCase = new UseExportedService(new SampleAliceServiceMock());
    $useCase(function ($line) {
    });

    $this->assertTrue(true);
});
