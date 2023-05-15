<?php

namespace App\Management\Requirements;

use App\Management\Models\YardGroup;

/**
 * La-Plus３：開発主要要件一覧　No.27
 */
class Requirement27
{
    //機能カテゴリ(サービス)
    //コンテナ作業スケジュール管理

    //サブカテゴリ
    //カレンダー表示

    //要件・要望
    //ヤードごとの休日設定・表示が欲しい。ヤード毎なので表現方法は要検討

    //補足
    //複数選択したヤードのうち、一つ以上のヤードが休日（または営業）している場合の表現の方法をどうするか。。

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //補足の「複数選択したヤードのうち、一つ以上のヤードが休日（または営業）している場合の表現の方法をどうするか。。」については、
        //↓で複数ヤードの作業スケジュールの表示は不要、ということにしたので無視
        (new ClabelHearing7())->main();
        
        // ヤードグループに休日設定ができるようにする
        (new YardGroup())->holidaySetting;

        return false;
    }
}
