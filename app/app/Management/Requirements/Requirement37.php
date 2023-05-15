<?php

namespace App\Management\Requirements;

use App\Management\Models\ContainerJob;
use App\Management\Models\RoroJob;

/**
 * La-Plus３：開発主要要件一覧　No.37
 */
class Requirement37
{
    //機能カテゴリ(サービス)
    //本船スケジュール管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //「スライド」の概念を入れる方向で検討。スライド用の仮の船を管理できるようにする。

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //元々の要件では「スライド用の仮の船を管理できるようにする。」とあるが、
        //コンテナJOBやROROJOBに「本船スケジュールを変更する必要がある(=スライド)」という情報を持たせることができれば良い、ということになった。
        //参考:2022/11/17 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2276022
        (new ContainerJob())->shipScheduleSlide;
        (new RoroJob())->shipScheduleSlide;

        return true;
    }
}
