<?php

use Services\Lp3Cargo\App\Http\UseCases\CarModel\Destroy;
use Services\Lp3Cargo\App\Models\CarBrand;
use Services\Lp3Cargo\App\Models\CarModel;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();
    $carModel1 = CarModel::factory()->create(['car_brand_id' => $carBrand->id]);

    $useCase = new Destroy();
    $result = $useCase($carModel1->id);

    $this->assertEquals($result->name,$carModel1->name);
    $this->assertEquals($result->name_en,$carModel1->name_en);
    $this->assertEquals($result->car_brand_id,$carBrand->id);
    $this->assertEquals($result->carBrand->name, $carBrand->name);
    $this->assertEquals($result->carBrand->name_en, $carBrand->name_en);

    $this->assertSoftDeleted($carModel1);
});
