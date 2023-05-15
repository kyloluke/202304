<?php

namespace App\Management\Requirements;

use App\Management\Models\ShipSchedule;

/**
 * La-Plus３：開発主要要件一覧　No.39
 */
class Requirement39
{
    //機能カテゴリ(サービス)
    //本船スケジュール管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //本船名＋VOYでユニークにならないケースが増えているため（定期的なスケジュールで同じ本船名＋VOYの船が登場するようになってきている→いまのところRORO船のみで発生。
    //将来的にはコンテナ船も同じ問題が出る可能性はある）、条件を満たせば、同じ本船名＋VOYの本船を登録できるようにする必要がある。
    //例）条件＝出航済みの本船については、同じ本船名＋VOYで登録できる　など。

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //LP2のオーシャン・スケジュール取込で同じような問題が発生し、以下の条件をすべて満たしている場合は重複あり、と判定するようにした
        //・船会社が一致している
        //・本船が一致している
        //・VOYが一致している
        //・一番新しい揚地の到着予定日と、一番古い積地の出発予定日の差が200日未満
        //参考: https://sync-logi.backlog.com/view/LP2-266

        (new ShipSchedule())->isUnique();

        return true;
    }
}
