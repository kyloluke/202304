<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarBrand;

it('smoke', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();

    $this
        ->json('delete', 'api/lp3-cargo/car-brand/' . $carBrand->id)
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    CarBrand::truncate();

    $this
        ->json('delete', 'api/lp3-cargo/car-brand/1')
        ->assertNotFound();
});
