<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContainerPhotoScreen;
use App\Management\Screens\RoroJob\RoroPhotoScreen;

/**
 * ヒアリング改善要望 No.20
 */
class ClabelHearing20
{
    //課題＆要望
    //画像がチェックできる間口を1つに統一して欲しい

    //背景/理由
    //搬入とvannningの画像を見るための入り口が現在だと2つある状態なので、統一してほしい

    //改善案
    //・jobの配下に車輌が紐づいている
    //・車輌
    //SHIPPING (CONTAINER)＞画像データのタブに、紐づく車輌の画像を表示させる
    //ただし、個別車輌のアップロードはできないものとする（表示とダウンロードのみできる）
    //https://docs.google.com/spreadsheets/d/1TDMeyPhUxJpO9mEjQxY4Z0xB7e4StJ16Ts_avtnamgI/edit#gid=558363085

    // メモ
    // (なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // コンテナ写真の画面で紐づいている車輌の写真も表示できるようにする
        (new ContainerPhotoScreen())->viewChassisPhoto();

        // RORO写真の画面で紐づいている車輌の写真も表示できるようにする
        (new RoroPhotoScreen())->viewChassisPhoto();

        // > ・コンテナに紐づいている車両を表示したい件で、車両の写真一覧画面で紐づいているコンテナの写真を見ることは考慮しない。
        // > 引用元: 議事録/2023/02/16 - 表示項目・LP3権限他要件定義 https://sync-logi.backlog.com/alias/wiki/2456821
        //
        //車輌の画面でコンテナやROROの写真は表示しない
        //コンテナやROROの写真には別の車輌の写真が含まれる場合があるため

        return true;
    }
}
