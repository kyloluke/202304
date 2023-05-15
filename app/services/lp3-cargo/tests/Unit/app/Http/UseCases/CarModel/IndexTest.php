<?php

use Services\Lp3Cargo\App\Http\UseCases\CarModel\Index;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;
use Carbon\Carbon;

it('smoke', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create([
        'name' => 'トヨタ',
        'name_en' => 'Toyota',
    ]);

    $data = [
        [
            'name' => 'プリウス',
            'name_en' => 'Prius',
            'car_brand_id' => $carBrand->id,
        ],
        [
            'name' => 'プリウス50',
            'name_en' => 'Prius50',
            'car_brand_id' => $carBrand->id,
        ],

    ];

    $carModels = [];
    foreach ($data as $key => $value) {
        array_push($carModels, CarModel::factory()->create($data[$key]));
    }

    $useCase = new Index();
    $result = $useCase($data[0]['name'], $data[0]['name_en'], $carBrand->id, $carBrand->name, $carBrand->name_en);

    $this->assertEquals($result->count(),2);
    foreach ($result as $key => $value) {
        $this->assertEquals($value->name,$carModels[$key]->name);
        $this->assertEquals($value->name_en,$carModels[$key]->name_en);
        $this->assertEquals($value->car_brand_id,$carBrand->id);
        $this->assertEquals($value->carBrand->name,$carBrand->name);
        $this->assertEquals($value->carBrand->name_en,$carBrand->name_en);
    }
});

it('no data', function () {
    /** @var TestCase $this */

    // 自動車ブランドが削除されている時に車種を表示できないことを確認
    $carBrand = CarBrand::factory()->create(['deleted_at' => Carbon::today()]);

    $data = [
        'name' => 'プリウス',
        'name_en' => 'Prius',
        'car_brand_id' => $carBrand->id,
    ];

    $carModel1 = CarModel::factory()->create($data);
    $useCase = new Index();
    $result = $useCase($data['name'], $data['name_en'], $carBrand->id, $carBrand->name, $carBrand->name_en);

    $this->assertEquals($result->count(),0);
});
