<?php

use Services\Lp3Core\App\Http\UseCases\Country\CsvDownload;
use Services\Lp3Core\App\Models\Country;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */
    $data = [
        'name' => 'テスト国',
    ];

    $country1 = Country::factory()->create($data);
    $country2 = Country::factory()->create($data);
    $ids = [$country1->id, $country2->id];

    $useCase = new CsvDownload();
    $result = $useCase($ids, $data['name']);

    $this->assertEquals($result->count(),2);
    $this->assertEquals($result[0]->id,$country1->id);
    $this->assertEquals($result[1]->id,$country2->id);
    $this->assertEquals($result[0]->name,$country1->name);
    $this->assertEquals($result[1]->name,$country2->name);
    $this->assertEquals($country1->region_id, $result[0]->region_id);
    $this->assertEquals($country2->region_id, $result[1]->region_id);
    $this->assertEquals($country1->region->name, $result[0]->region->name);
    $this->assertEquals($country2->region->name, $result[1]->region->name);
});

it('big data', function () {
    /** @var TestCase $this */

    $num = 10000;
    $countrys = [];
    $ids = [];

    for ($i = 0; $i < $num; $i++) {
        $country = Country::factory()->create();
        $countrys[$country->id] = $country;
        $ids[] = $country->id;
    }

    $useCase = new CsvDownload();
    $result = $useCase($ids);
    $this->assertEquals($result->count(),$num);

    foreach ($countrys as $key => $value) {
        $this->assertEquals($key,$countrys[$key]->id);
        $this->assertEquals($value->name,$countrys[$key]->name);
        $this->assertEquals($value->region_id, $countrys[$key]->region_id);
        $this->assertEquals($value->region->name, $countrys[$key]->region->name);
    }
});
