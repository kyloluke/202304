<?php

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\CsvDownload;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    $data = [
        'name' => 'レクサス',
        'name_en' => 'Lexus',
    ];

    $carBrand1 = CarBrand::factory()->create($data);
    $carBrand2 = CarBrand::factory()->create($data);
    $ids = [$carBrand1->id, $carBrand2->id];

    $useCase = new CsvDownload();
    $result = $useCase($ids, $data['name'], $data['name_en']);

    $this->assertEquals($result->count(),2);
    $this->assertEquals($result[0]->id,$carBrand1->id);
    $this->assertEquals($result[1]->id,$carBrand2->id);
    $this->assertEquals($result[0]->name,$carBrand1->name);
    $this->assertEquals($result[1]->name,$carBrand2->name);
    $this->assertEquals($result[0]->name_en,$carBrand1->name_en);
    $this->assertEquals($result[1]->name_en,$carBrand2->name_en);
});

it('big data', function () {
    /** @var TestCase $this */

    $num = 10000;
    $carBrands = [];
    $ids = [];

    for ($i = 0; $i < $num; $i++) {
        $carBrand = CarBrand::factory()->create();
        $carBrands[$carBrand->id] = $carBrand;
        $ids[] = $carBrand->id;
    }

    $useCase = new CsvDownload();
    $result = $useCase($ids);
    $this->assertEquals($result->count(),$num);

    foreach ($carBrands as $key => $value) {
        $this->assertEquals($key,$carBrands[$key]->id);
        $this->assertEquals($value->name,$carBrands[$key]->name);
        $this->assertEquals($value->name_en,$carBrands[$key]->name_en);
    }
});
