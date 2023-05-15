<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisCreateSharedLinkApi;

/**
 * 車輌の写真の共有リンクの生成
 */
class ChassisGenerateSharePhotoLink
{
    // LP2
    // ログインしていない状態でも車輌写真が閲覧できるURLを生成している

    // 共有リンクのフローがボヤッとしているので後回し
    // 共有リンクには有効期限があったはず
    // リンク発行のUIが必要
    // リンク発行のAPIが必要
    // リンク停止のAPIが必要
    // 共有用の画面が必要かも

    public function main(): bool
    {
        // @todo 車輌の詳細画面 - 共有リンク発行
        // @todo 共有用の車輌詳細画面

        //共有リンクの作成API
        (new ChassisCreateSharedLinkApi())->main();

        return false;
    }
}
