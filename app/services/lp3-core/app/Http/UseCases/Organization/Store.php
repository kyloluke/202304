<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization;

use Illuminate\Support\Facades\DB;
use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の登録
 */
class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke($requestData): Organization
    {
        return DB::transaction(function () use ($requestData) {
            $organization = new Organization();
            $organization->name_jp = $requestData['nameJp'];
            $organization->name_en = $requestData['nameEn'];
            $organization->canonical_name = $requestData['canonicalName'];
            $organization->name_abbr = $requestData['nameAbbr'];
            $organization->representative_name = $requestData['representativeName'];
            $organization->system_usage = $requestData['systemUsage'];
            if (!is_null($requestData['logoFileId'])) {
                $organization->use_logo_file_id = $requestData['logoFileId'];
            }
            $organization->save();

            // @todo 画像アップロード用のAPIを作る。（5/10：中嶋）
            // 背景：画像の削除と更新なしを判別することが困難であるため、画像アップロード用のAPiを実装することによって対応する方針になった。

            // @todo users, offices, yards, officeUsers, yardGroupStaffs, YardGroupManagersの更新をどこでやるか決める（もしくはAPIを作る）。（5/10：中嶋）
            return $organization;
        });
    }
}
