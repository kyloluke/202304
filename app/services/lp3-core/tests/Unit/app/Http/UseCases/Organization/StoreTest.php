<?php

use Services\Lp3Core\App\Enums\SystemUsage;
use Services\Lp3Core\App\Http\UseCases\Organization\Store;
use Services\Lp3Core\App\Models\OrganizationLogoFile;
use Tests\TestCase;

it('creates a organization', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'nameJp' => "テスト",
        'nameEn' => "test",
        'canonicalName' => "株式会社テスト",
        'nameAbbr' => "(株)テスト",
        'representativeName' => "テスト太郎",
        'logoFileId' => OrganizationLogoFile::factory()->create()->id,
        'systemUsage' => SystemUsage::ADMINISTRATION->value,
    ];

    // ユースケース呼び出し
    $useCase = new Store();
    $result = $useCase($data);

    // 登録内容と登録用データが一致していることを確認
    $this->assertEquals($result->name_jp, $data['nameJp']);
    $this->assertEquals($result->name_en, $data['nameEn']);
    $this->assertEquals($result->canonical_name, $data['canonicalName']);
    $this->assertEquals($result->name_abbr, $data['nameAbbr']);
    $this->assertEquals($result->representative_name, $data['representativeName']);
    $this->assertEquals($result->use_logo_file_id, $data['logoFileId']);
    $this->assertEquals($result->system_usage, $data['systemUsage']);

    $this->assertDatabaseHas('organizations', [
        'name_jp' => $data['nameJp'],
        'name_en' => $data['nameEn'],
        'canonical_name' => $data['canonicalName'],
        'name_abbr' => $data['nameAbbr'],
        'representative_name' => $data['representativeName'],
        'use_logo_file_id' => $data['logoFileId'],
        'system_usage' => $data['systemUsage'],
    ]);
});
