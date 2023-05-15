<?php

use Services\SampleAlice\App\Http\UseCases\Animal\Show;
use Services\SampleAlice\App\Models\Animal;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    Animal::factory()->create(['id' => 1]);

    $useCase = new Show();
    $useCase(1);

    $this->assertTrue(true);
});
