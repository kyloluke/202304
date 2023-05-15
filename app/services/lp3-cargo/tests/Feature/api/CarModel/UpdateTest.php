<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;
use Carbon\Carbon;

it('validate_errors', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();
    $carmodel = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('put', 'api/lp3-cargo/car-model/' . $carmodel->id)
        ->assertJsonValidationErrors(['name','nameEn','carBrandId']);
});

it('updated', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create();

    $carmodel = CarModel::factory()->create([
        'car_brand_id' => $carBrand->id,
    ]);

    $this
        ->json('put', 'api/lp3-cargo/car-model/' . $carmodel->id,[
            'name' => 'テスト',
            'nameEn' => 'test',
            'carBrandId' => $carBrand->id,
        ])
        ->assertOk();
});

it('no data', function () {
    /** @var TestCase $this */
    CarModel::truncate();
    CarBrand::truncate();

    $this
        ->json('put', 'api/lp3-cargo/car-model/1',[
            'name' => 'テスト',
            'nameEn' => 'test',
            'carBrandId' => 1,
        ])
        ->assertJsonValidationErrors(['carBrandId']);

    // 自動車ブランドが削除されている時に車種を更新できないことを確認
    $carBrand = CarBrand::factory()->create(['deleted_at' => Carbon::today()]);
    $carModel1 = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('put', 'api/lp3-cargo/car-model/1',[
            'name' => 'テスト',
            'nameEn' => 'test',
            'carBrandId' => $carBrand->id,
        ])
        ->assertJsonValidationErrors(['carBrandId']);
});
