<?php

use Services\Lp3Core\App\Enums\SystemUsage;
use Services\Lp3Core\App\Models\OrganizationLogoFile;
use Tests\TestCase;

it('validate errors required params are empty', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'nameJp' => "",
        'nameEn' => "",
        'systemUsage' => "",
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/organization', $data)
        ->assertJsonValidationErrors(array_keys($data));
});

it('validate errors integer params are incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'nameJp' => "テスト",
        'nameEn' => "test",
        'logoFileId' => "test",
        'systemUsage' => "test",
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/organization', $data)
        ->assertJsonValidationErrors([
            'logoFileId',
            'systemUsage'
        ]);
});

it('validate errors date params are incorrect data type', function () {
    /** @var TestCase $this */

    // 登録データ作成
    $data = [
        'nameJp' => 1,
        'nameEn' => 1,
        'canonicalName' => 1,
        'nameAbbr' => 1,
        'representativeName' => 1,
        'systemUsage' => SystemUsage::ADMINISTRATION->value,
    ];

    // api call
    $this
        ->json('post', 'api/lp3-core/organization', $data)
        ->assertJsonValidationErrors([
            'nameJp',
            'nameEn',
            'canonicalName',
            'nameAbbr',
            'representativeName',
        ]);
});

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

    // api call
    $result = $this->json('post', 'api/lp3-core/organization', $data);

    // レスポンスが正常に返ってくることを確認
    $result->assertCreated();
});
