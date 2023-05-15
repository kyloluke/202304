<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkRequestCarryOutApi;
use App\Management\Apis\Lp3Cargo\ChassisRequestCarryOutApi;
use App\Management\Models\Chassis;

/**
 * 車輌の内貨搬出を依頼する
 */
class ChassisRequestLocalOut
{
    public function main(): bool
    {
        (new Chassis)->yardCarryInOutHistories;

        // @todo 車輌一覧画面での内貨搬出依頼
        // 車輌の一括内貨搬出依頼API
        (new ChassisBulkRequestCarryOutApi())->main();

        // @todo 車輌詳細画面での内貨搬出依頼
        // 車輌の内貨搬出依頼API
        (new ChassisRequestCarryOutApi())->main();

        // @todo ヤードスタッフへの通知

        // > ・事業所マスタのユーザー一覧でメールアドレスの表示をユーザー名に置き換える。
        // > ・メールアドレスの選択ではなく、ユーザー名の選択に変更する。
        // > 引用元: 議事録/2023/02/16 - 表示項目・LP3権限他要件定義 https://sync-logi.backlog.com/alias/wiki/2456821
        //
        //通知先をユーザーが選択する際、LP2では通知先のメールアドレスを選択or入力するようになっていたが、LP3では通知先のユーザーを選択するようにする
        //主に以下の理由で上記のように変更する
        //・ユーザー毎に通知のON/OFFやメール通知/システム内通知などの設定ができるようにする
        //・通知先のユーザーのメールアドレスが無関係のユーザーにも表示される、ということは避けた方が良い

        return false;
    }
}
