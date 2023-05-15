<?php

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Store;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $data = [
        'name' => 'test_name',
        'nameEn' => 'test_en',
    ];

    $useCase = new Store();
    $result = $useCase($data);

    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->name_en, $data['nameEn']);

    $this->assertDatabaseHas('car_brands',[
        'name' => $data['name'],
        'name_en' => $data['nameEn'],
    ]);
});
