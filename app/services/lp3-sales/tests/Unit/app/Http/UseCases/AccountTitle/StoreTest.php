<?php

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Store;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $data = [
        'name' => 'test_name',
        'name_en' => 'test_en',
        'code' => '1001',
        'available' => '1',
        'ordinary' => '0',
    ];

    $useCase = new Store();
    $result = $useCase($data);

    $this->assertEquals($result->name, 'test_name');

    $this->assertDatabaseHas('account_titles',[
        'name' => 'test_name',
        'name_en' => 'test_en',
        'code' => '1001',
        'available' => '1',
        'ordinary' => '0',
    ]);
});
