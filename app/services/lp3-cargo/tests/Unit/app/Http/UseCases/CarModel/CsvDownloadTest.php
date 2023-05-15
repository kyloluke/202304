<?php

use Services\Lp3Cargo\App\Http\UseCases\CarModel\CsvDownload;
use Services\Lp3Cargo\App\Models\CarBrand;
use Services\Lp3Cargo\App\Models\CarModel;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create([
        'name' => 'トヨタ',
        'name_en' => 'Toyota',
    ]);

    $data = [
        [
            'id' => 1,
            'name' => 'プリウス',
            'name_en' => 'Prius',
            'car_brand_id' => $carBrand->id,
        ],
        [
            'id' => 2,
            'name' => 'プリウス50',
            'name_en' => 'Prius50',
            'car_brand_id' => $carBrand->id,
        ],

    ];

    $carModels = [];
    foreach ($data as $key => $value) {
        array_push($carModels, CarModel::factory()->create($data[$key]));
    }

    $useCase = new CsvDownload();
    $ids = [$carModels[0]['id'], $carModels[1]['id']];
    $result = $useCase($ids, $data[0]['name'], $data[0]['name_en'], $carBrand->id, $carBrand->name, $carBrand->name_en);

    $this->assertEquals($result->count(),2);
    foreach ($result as $key => $value) {
        $this->assertEquals($value->id,$carModels[$key]->id);
        $this->assertEquals($value->name,$carModels[$key]->name);
        $this->assertEquals($value->name_en,$carModels[$key]->name_en);
        $this->assertEquals($value->car_brand_id,$carBrand->id);
        $this->assertEquals($value->carBrand->name,$carBrand->name);
        $this->assertEquals($value->carBrand->name_en,$carBrand->name_en);
    }
});

it('big data', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create([
        'name' => 'トヨタ',
        'name_en' => 'Toyota',
    ]);

    $num = 10000;
    $carModels = [];
    $ids = [];

    for ($i = 0; $i < $num; $i++) {
        $carModel = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);
        $carModels[$carModel->id] = $carModel;
        $ids[] = $carModel->id;
    }

    $useCase = new CsvDownload();
    $result = $useCase($ids);
    $this->assertEquals($result->count(),$num);

    foreach ($carModels as $key => $value) {
        $this->assertEquals($key,$carModels[$key]->id);
        $this->assertEquals($value->name,$carModels[$key]->name);
        $this->assertEquals($value->name_en,$carModels[$key]->name_en);
        $this->assertEquals($value->car_brand_id,$carBrand->id);
        $this->assertEquals($value->carBrand->name,$carBrand->name);
        $this->assertEquals($value->carBrand->name_en,$carBrand->name_en);
    }
});
