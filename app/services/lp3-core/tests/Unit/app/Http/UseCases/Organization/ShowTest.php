<?php

use Services\Lp3Core\App\Http\UseCases\Organization\Show;
use Services\Lp3Core\App\Models\Organization;
use Tests\TestCase;

it('gets a organization', function () {
    /** @var TestCase $this */

    // テストデータ作成
    $targetOrganization = Organization::factory()->create();

    // ユースケース呼び出し
    $useCase = new Show();
    $result = $useCase($targetOrganization->id);

    // 取得内容と作成したテストデータが一致していることを確認
    $this->assertEquals($result->id, $targetOrganization->id);
    $this->assertEquals($result->name_jp, $targetOrganization->name_jp);
    $this->assertEquals($result->name_en, $targetOrganization->name_en);
});
