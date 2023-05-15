<?php

use Services\Lp3Cargo\App\Http\UseCases\CarModel\Store;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();

    $data = [
        'name' => 'test_name',
        'nameEn' => 'test_en',
        'carBrandId' => $carBrand->id,
    ];

    $useCase = new Store();
    $result = $useCase($data);

    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->name_en, $data['nameEn']);
    $this->assertEquals($result->car_brand_id, $carBrand->id);
    $this->assertEquals($result->carBrand->name, $carBrand->name);
    $this->assertEquals($result->carBrand->name_en, $carBrand->name_en);

    $this->assertDatabaseHas('car_models',[
        'name' => $data['name'],
        'name_en' => $data['nameEn'],
    ]);
});
