<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarBrand;
use Services\Lp3Cargo\App\Models\CarModel;
use Carbon\Carbon;

it('smoke', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create();
    $carmodel = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('get', 'api/lp3-cargo/car-model/' . $carmodel->id)
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    CarModel::truncate();

    $this
        ->json('get', 'api/lp3-cargo/car-model/1')
        ->assertNotFound();

    // 自動車ブランドが削除されている時に車種を表示できないことを確認
    $carBrand = CarBrand::factory()->create(['deleted_at' => Carbon::today()]);
    $carmodel = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('get', 'api/lp3-cargo/car-model/' . $carmodel->id)
        ->assertStatus(500);
});
