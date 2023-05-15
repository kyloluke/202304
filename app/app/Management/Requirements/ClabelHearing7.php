<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobScheduleListScreen;

/**
 * ヒアリング改善要望 No.7
 */
class ClabelHearing7
{
    //課題＆要望
    //シッピングコンテナスケジュール画面の変更

    //背景/理由
    //(なし)

    //改善案
    //シッピング＞コンテナスケジュール画面
    //・全yardでの表示はなくす
    //https://la-plus2.sync-logi.com/#/vanning/sched
    //・yard毎の画面のみにする

    //メモ
    //yard単位で休業日設定ができるようにするという要望はアバンテ様にお伝え済み

    /**
     * main
     *
     * @return bool
     */
    public function main():bool
    {
        //メモの「yard単位で休業日設定ができるようにするという要望はアバンテ様にお伝え済み」については、
        //↓と重複しているため無視
        (new Requirement27)->main();

        //コンテナJOBのスケジュール一覧画面で、ヤード毎の作業スケジュールの表示をする
        //LP2では複数ヤードの作業スケジュールが混在した状態での表示が出来るようにしていたが、複数ヤードの作業スケジュールが混在した状態での表示は不要
        (new ContJobScheduleListScreen())->viewContainerJobSchedule();

        return true;
    }
}
