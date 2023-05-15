<?php

use Services\Lp3Core\App\Http\UseCases\Organization\Index;
use Services\Lp3Core\App\Models\Organization;
use Tests\TestCase;

it('gets all organizations', function () {
    /** @var TestCase $this */

    // テストデータ作成
    Organization::factory(10)->create();

    // ユースケース呼び出し
    $useCase = new Index();
    $queryParameterArray = []; // $useCaseの引数として必要なため定義
    $result = $useCase($queryParameterArray);

    // 取得件数が10件であることを確認
    $this->assertEquals(count($result->items()), 10);
});
