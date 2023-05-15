<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarBrand;
use Services\Lp3Cargo\App\Models\CarModel;

it('smoke', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create();
    $carmodel = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('delete', 'api/lp3-cargo/car-model/' . $carmodel->id)
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    CarModel::truncate();

    $this
        ->json('delete', 'api/lp3-cargo/car-model/1')
        ->assertNotFound();
});
