<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization;

use Services\Lp3Core\App\Http\UseCases\Organization\Exceptions\OrganizationDeleteException;
use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Organization
    {
        $targetOrganization = Organization::with(
            'organizationLogoFile',
            'offices',
            'users',
            'yardGroups'
        )->findOrFail($id);

        // 削除が可能になる条件：使用されていないこと。
        // → 上記を判定するために、組織に紐づいている情報が１つでもあれば削除できないという条件を記述している。
        if (
            $targetOrganization->offices()->count() >= 1 ||
            $targetOrganization->users()->count() >= 1 ||
            $targetOrganization->yardGroups()->count() >= 1
        ) {
            throw new OrganizationDeleteException(OrganizationDeleteException::IN_USE);
        }

        $targetOrganization->delete();
        return $targetOrganization;
    }
}
