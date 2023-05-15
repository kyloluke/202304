<?php

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Update;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $carBrand = CarBrand::factory()->create();

    $data = [
        'name' => 'test_after',
        'nameEn' => 'test_en',
    ];

    $useCase = new Update();
    $result = $useCase($carBrand->id, $data);

    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->name_en, $data['nameEn']);

    $this->assertDatabaseHas('car_brands',[
        'id' => $carBrand->id,
        'name' => $data['name'],
        'name_en' => $data['nameEn'],
    ]);
});
