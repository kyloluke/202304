<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisCreateSharedLinkApi;

/**
 * 車輌の書類のWeb共有リンク発行
 */
class ChassisGenerateShareLinkForDocument
{
    public function main(): bool
    {
        // @todo 車輌詳細画面
        // @todo 共有用の車輌詳細画面

        //共有リンクの作成API
        (new ChassisCreateSharedLinkApi())->main();

        return false;
    }
}
