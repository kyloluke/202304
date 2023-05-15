<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisCreateSharedLinkApi;

/**
 * 車輌の写真のWeb共有リンク発行
 */
class ChassisGenerateShareLinkForPhoto
{
    public function main(): bool
    {
        // @todo 機能一覧に追加する

        // @todo 車輌詳細画面
        // @todo 共有用の車輌詳細画面

        //共有リンクの作成API
        (new ChassisCreateSharedLinkApi())->main();

        return false;
    }
}
