<?php

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Index;
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

    $useCase = new Index();
    $result = $useCase($data['name'], $data['name_en']);

    $this->assertEquals($result->count(),2);
    $this->assertEquals($result[0]->name,$carBrand1->name);
    $this->assertEquals($result[1]->name,$carBrand2->name);
    $this->assertEquals($result[0]->name_en,$carBrand1->name_en);
    $this->assertEquals($result[1]->name_en,$carBrand2->name_en);
});
