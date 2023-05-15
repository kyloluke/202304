<?php

use Tests\TestCase;
use Services\Lp3Cargo\App\Models\CarBrand;
use Services\Lp3Cargo\App\Models\CarModel;
use Carbon\Carbon;

it('validate_errors', function () {
    /** @var TestCase $this */

    $this
        ->json('post', 'api/lp3-cargo/car-model')
        ->assertJsonValidationErrors(['name','nameEn','carBrandId']);
});

it('created', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create();

    $this
        ->json('post', 'api/lp3-cargo/car-model',[
            'name' => 'テスト',
            'nameEn' => 'test',
            'carBrandId' => $carBrand->id,
        ])
        ->assertCreated();

    // 自動車ブランドが削除されている時に車種を登録できないことを確認
    $carBrand = CarBrand::factory()->create(['deleted_at' => Carbon::today()]);
    $carModel1 = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $this
        ->json('post', 'api/lp3-cargo/car-model',[
            'name' => 'テスト',
            'nameEn' => 'test',
            'carBrandId' => $carBrand->id,
        ])
        ->assertJsonValidationErrors(['carBrandId']);
});
