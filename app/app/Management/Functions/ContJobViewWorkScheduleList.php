<?php

namespace App\Management\Functions;

/**
 * コンテナJOBの作業スケジュール一覧の表示
 */
class ContJobViewWorkScheduleList
{
    //■LP3要件・要望
    //ユーザーの種別・権限によって検索項目を変える
    //ヤードごとの休日設定・表示ができるように
    //作業指示書ダウンロード時のファイルフォーマットはエクセル以外(PDF)も検討
    //作業本数・台数サマリ表示

    //■備考
    //No26
    //No27
    //https://sync-logi.backlog.com/alias/wiki/2077318
    //ヒアリング改善要望 No7(STEP1)
    //ヒアリング改善要望 No8(STEP2)
    //https://docs.google.com/spreadsheets/d/1TeKn0509Qc-JJ2Giju1HdRtPaRRbl8us96M2V4b-eo8/edit#gid=0

    //■対応内容
    //ヒアリング改善要望 No8(STEP2)の内容：特定の日付・ヤードで作業件数が0件の場合に0件であることを通知してほしい

    //■メモ
    //作業確定できる状態のコンテナJOBがいくつあるか確認できる必要がある。
    //コンテナJOBの通関用の書類がアップロードされているか確認できる必要がある。
    //コンテナJOBの船積み予定車輌の情報、コンテナ搬入するためのブッキングの情報が確認できる必要がある。
    //CLABEL様からの改善案(ヒアリング改善要望)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        return false;
    }
}
