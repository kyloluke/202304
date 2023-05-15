<?php

namespace App\Management\Models;

/**
 * 本船スケジュール
 */
class ShipSchedule
{
    //「備考」のプロパティは不要
    //LP2では「備考」のプロパティを持っていたが、更新の際の更新理由を追記するための入れ物になっている。
    //LP3への移行時には、LP2の「備考」は分割し、「本船スケジュール変更履歴」の「備考(=更新理由)」にする。

    /**
     * ユニークか？
     *
     * @return true;
     */
    public function isUnique(): bool
    {
        //以下の条件をすべて満たしている別のデータがある場合は、重複ありと判定する
        //・船会社が一致している
        //・本船が一致している
        //・VOYが一致している
        //・一番新しい揚地の到着予定日と、一番古い積地の出発予定日の差が200日未満
        //参考: https://sync-logi.backlog.com/view/LP2-266

        return true;
    }
}
