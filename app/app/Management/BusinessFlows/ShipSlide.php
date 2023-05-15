<?php

namespace App\Management\BusinessFlows;

use App\Management\Models\ContainerJob;
use App\Management\Models\RoroJob;

/**
 * 本船スライド
 */
class ShipSlide extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 21;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '本船スライド';
    }

	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //memo:
        //「本船スライド」という業務フローになっているが、
        //コンテナJOB,ROROJOBの船積予定だった本船スケジュールが変更になった場合の業務フロー、という意味合いの方が実体に近い
        //
        //「本船スライド」に関しては、コンテナJOBやROROJOBに「本船スケジュールを変更する必要がある(=スライド)」という情報を持たせることにする
        //SYNC OP
        //「コンテナJOB」「ROROJOB」の「本船スケジュールスライドフラグ」
        (new ContainerJob())->shipScheduleSlide;
        (new RoroJob())->shipScheduleSlide;

        //JOBの船積みが確定しているか否か
        $shipping = true;
        if($shipping){
            //SYNC OPが作業確定の解除を行う
            // @todo 作業確定解除機能を追加
        }

        //SYNC OPが船積JOBの情報を修正する。
        // @todo JOBの情報修正機能を作成
        // @todo JOBの[本船スケジュールを変更する必要がある(=スライド)]フラグを立てる機能を作成する。
        (new ContainerJob())->shipScheduleSlide;
        (new RoroJob())->shipScheduleSlide;

        //JOBの船積みが確定していたか否か
        if($shipping){
            //船積み確定していた

            //作業が終了している(=CYヤードに搬入済み)か否か
            $work = true;

            if(!$work){
                //作業が終了していなかった

                //SYNC OPがヤードスタッフとドレー会社に本船のスケジュールが変わった旨の連絡をする。
            }

            //SYNC OPが通関書類の本船情報を変更する。(Excelファイル)を行う。

            //SYNC OPが乙仲へ変更連絡を行う。
            // @todo 書類のアップロード機能・乙仲への通知機能を作成する。

            //通関作業が完了しているか否か
            $clearance = true;
            if($clearance){
                //通関作業が完了している場合

                //乙仲がED(輸出許可証)に記載されている本船名を変更する手続きを行う。

                //乙仲が修正版のED(輸出許可証)をアップロードする。
                // @todo 修正版のED(輸出許可証)のアップロード機能を作成する
            }
            else{
                //通関作業が完了していない場合

                //乙仲がED(輸出許可証)をアップロードする。

                // @todo ED(輸出許可証)のアップロード機能を作成する
            }
        }
        return false;
    }
}
