<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobScheduleListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.28
 */
class Requirement28
{
    //機能カテゴリ(サービス)
    //コンテナ作業スケジュール管理

    //サブカテゴリ
    //作業日程変更機能

    //要件・要望
    //ドラッグ＆ドロップ操作
    //複数選択ができるとより便利

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //コンテナJOBのスケジュール一覧画面で、複数選択でコンテナJOBの作業スケジュールを編集できるようにする
        (new ContJobScheduleListScreen())->editContainerJobScheduleWithMultipleSelection();

        return true;
    }
}
