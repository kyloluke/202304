<?php

use Services\Lp3Core\App\Http\UseCases\Yard\Index;
use Services\Lp3Core\App\Models\Yard;
use Tests\TestCase;

it('gets all yards', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Yard::factory(10)->create();

    // ユースケース呼び出し
    $useCase = new Index();
    $queryParameterArray = []; // $useCaseの引数として必要なため定義
    $result = $useCase($queryParameterArray);

    // 取得件数が10件であることを確認
    $this->assertEquals(count($result->items()), 10);
});
