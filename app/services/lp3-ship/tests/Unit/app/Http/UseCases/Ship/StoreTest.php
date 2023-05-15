<?php

use Services\Lp3Ship\App\Http\UseCases\Ship\Store;
use Tests\TestCase;

it('creates a ship', function () {
    /** @var TestCase $this */

    // 登録用データ作成
    $data = [
        'name' => "test",
        'type' => 1
    ];

    // ユースケース呼び出し
    $useCase = new Store();
    $result = $useCase($data);

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals($result->name, $data['name']);
    $this->assertEquals($result->type, $data['type']);
});
