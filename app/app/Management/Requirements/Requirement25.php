<?php

namespace App\Management\Requirements;

/**
 * La-Plus３：開発主要要件一覧　No.25
 */
class Requirement25
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

    //サブカテゴリ
    //メール通知

    //要件・要望
    //メール通知先カスタマイズしたい、ユーザー毎に受信設定できるような形

    //補足
    //作業確定メールについては、ヤードマスタ内にメール設定があればよいのではないか。

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        // > メール通知先カスタマイズしたい、
        //
        //通知の送信先を選択するようにさせる(LP2を踏襲)
        //通知の送信先はメールアドレスではなく、ユーザーを選択するようにする

        // > ユーザー毎に受信設定できるような形
        //
        // @todo ユーザーが種類ごとに通知のON/OFFができるようにする機能を作成する

        // > 作業確定メールについては、ヤードマスタ内にメール設定があればよいのではないか。
        //
        //アイディアレベルのものなので無視する

        return false;
    }
}
