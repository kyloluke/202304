<?php

use Services\Lp3Core\App\Http\UseCases\InspectionType\Update;
use Services\Lp3Core\App\Models\InspectionType;
use Tests\TestCase;

it('update a inspection-type', function () {
    /** @var TestCase $this */

    $data = [
        'name' => "名称が更新しました、＄％％＆”＃",
    ];
    $type = InspectionType::factory()->create();
    $useCase = new Update();
    $result = $useCase($type->id, $data);
    $this->assertEquals($result->name, $data['name']);
});
