<?php

use Services\Lp3Cargo\App\Http\UseCases\CarModel\Update;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    $carBrand = CarBrand::factory()->create();

    $carModel = CarModel::factory()->create([
        'car_brand_id' => $carBrand->id,
    ]);

    $data = [
        'name' => 'test_after',
        'nameEn' => 'test_en_after',
        'carBrandId' => $carBrand->id,
    ];

    $useCase = new Update();
    $result = $useCase($carModel->id, $data);

    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->name_en, $data['nameEn']);
    $this->assertEquals($result->car_brand_id, $carBrand->id);

    $this->assertDatabaseHas('car_models',[
        'id' => $carModel->id,
        'name' => $data['name'],
        'name_en' => $data['nameEn'],
    ]);
});
