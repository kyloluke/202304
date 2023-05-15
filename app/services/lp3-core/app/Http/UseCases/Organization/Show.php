<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization;

use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の取得
 */
class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Organization
    {
        return Organization::with(
            'organizationLogoFile',
            'offices',
            'users',
            'yardGroups'
        )->findOrFail($id);
    }
}
