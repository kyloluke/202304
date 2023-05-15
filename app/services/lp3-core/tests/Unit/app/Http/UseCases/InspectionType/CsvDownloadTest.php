<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\CsvDownload;
use Services\Lp3Core\App\Models\InspectionType;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    $data = [
        'name' => 'JEVIC検査',
    ];

    $inspectionType1 = InspectionType::factory()->create($data);
    $inspectionType2 = InspectionType::factory()->create($data);
    $ids = [$inspectionType1->id, $inspectionType2->id];

    $useCase = new CsvDownload();
    $result = $useCase($ids, $data['name']);

    $this->assertEquals($result->count(),2);
    $this->assertEquals($result[0]->id,$inspectionType1->id);
    $this->assertEquals($result[1]->id,$inspectionType2->id);
    $this->assertEquals($result[0]->name,$inspectionType1->name);
    $this->assertEquals($result[1]->name,$inspectionType2->name);
    $this->assertEquals($result[0]->name_en,$inspectionType1->name_en);
    $this->assertEquals($result[1]->name_en,$inspectionType2->name_en);
});

it('big data', function () {
    /** @var TestCase $this */

    $num = 10000;
    $inspectionTypes = [];
    $ids = [];

    for ($i = 0; $i < $num; $i++) {
        $inspectionType = InspectionType::factory()->create();
        $inspectionTypes[$inspectionType->id] = $inspectionType;
        $ids[] = $inspectionType->id;
    }

    $useCase = new CsvDownload();
    $result = $useCase($ids);
    $this->assertEquals($result->count(),$num);

    foreach ($inspectionTypes as $key => $value) {
        $this->assertEquals($key,$inspectionTypes[$key]->id);
        $this->assertEquals($value->name,$inspectionTypes[$key]->name);
        $this->assertEquals($value->name_en,$inspectionTypes[$key]->name_en);
    }
});
