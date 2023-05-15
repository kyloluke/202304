<?php

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Update;
use Services\Lp3Sales\App\Models\AccountTitle;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $accountTitle = AccountTitle::factory()->create([
        'name' => 'test_before',
    ]);

    $data = [
        'name' => 'test_after',
        'name_en' => 'test_en',
        'code' => '1001',
        'available' => '1',
        'ordinary' => '0',
    ];

    $useCase = new Update();
    $result = $useCase($accountTitle->id, $data);

    $this->assertEquals($result->name, 'test_after');

    $this->assertDatabaseHas('account_titles',[
        'id' => $accountTitle->id,
        'name' => 'test_after',
        'name_en' => 'test_en',
        'code' => '1001',
        'available' => '1',
        'ordinary' => '0',
    ]);
});
