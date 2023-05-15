<?php

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Destroy;
use Services\Lp3Cargo\App\Models\CarBrand;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    $carBrand1 = CarBrand::factory()->create();

    $useCase = new Destroy();
    $result = $useCase($carBrand1->id);

    $this->assertEquals($result->name,$carBrand1->name);
    $this->assertEquals($result->name_en,$carBrand1->name_en);

    $this->assertSoftDeleted($carBrand1);
});
