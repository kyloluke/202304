<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization;

use Illuminate\Support\Facades\DB;
use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の更新
 */
class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke(Organization $targetOrganization, $requestData): Organization
    {
        return DB::transaction(function () use ($targetOrganization, $requestData) {
            $targetOrganization->name_jp = $requestData['nameJp'];
            $targetOrganization->name_en = $requestData['nameEn'];
            $targetOrganization->canonical_name = $requestData['canonicalName'];
            $targetOrganization->name_abbr = $requestData['nameAbbr'];
            $targetOrganization->representative_name = $requestData['representativeName'];
            $targetOrganization->system_usage = $requestData['systemUsage'];
            if (!is_null($requestData['logoFileId'])) {
                // logoFileId = 0 は画像の登録を解除すると判断し、nullを入れる。
                $targetOrganization->use_logo_file_id = $requestData['logoFileId'] == 0 ? null : $requestData['logoFileId'];
            }

            // @todo 画像アップロード用のAPIを作る。（5/10：中嶋）
            // 背景：画像の削除と更新なしを判別することが困難であるため、画像アップロード用のAPiを実装することによって対応する方針になった。

            // @todo users, offices, yards, officeUsers, yardGroupStaffs, YardGroupManagersの更新をどこでやるか決める（もしくはAPIを作る）。（5/10：中嶋）
            $targetOrganization->save();
            return $targetOrganization;
        });
    }
}
