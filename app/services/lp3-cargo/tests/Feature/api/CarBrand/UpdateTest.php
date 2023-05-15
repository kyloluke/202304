<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarBrand;

it('validate_errors', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();

    $this
        ->json('put', 'api/lp3-cargo/car-brand/' . $carBrand->id)
        ->assertJsonValidationErrors(['name','nameEn']);
});

it('updated', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();

    $this
        ->json('put', 'api/lp3-cargo/car-brand/' . $carBrand->id,[
            'name' => 'テスト',
            'nameEn' => 'test',
        ])
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    CarBrand::truncate();

    $this
        ->json('put', 'api/lp3-cargo/car-brand/1',[
            'name' => 'テスト',
            'nameEn' => 'test',
        ])
        ->assertNotFound();
});
