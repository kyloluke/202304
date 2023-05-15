<?php

use Services\Lp3Core\App\Http\UseCases\Region\Store;
use Tests\TestCase;

it('creates a region', function () {
    /** @var TestCase $this */

    $data = [
        'name' => 'テスト地域名称　"&=#66',
    ];

    $useCase = new Store();
    $resData = $useCase($data)->toArray();
    $this->assertEquals($data['name'], $resData['name']);
});
