<?php

namespace App\Management\BusinessFlows;


/**
* 作業キャンセル
*/
class JobCancel extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 22;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '作業キャンセル';
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
        //輸出がキャンセルになったところからスタート

        //JOBの船積みが確定しているか否か
        $shipping = true;

        if($shipping){
            //JOBの船積みが確定している場合

            //通関作業が完了しているか否か
            $clearance = true;

            //作業が完了しているか否か
            $work = true;

            if($work) {
                //作業が完了している場合。

                //CYに搬入したか否か。
                $iscyyard = true;

                if($iscyyard){
                    //CYに搬入済みの場合
                    //SHIPPERにコンテナ引き出し連絡をする。
                }

            }

            //SYNC OPから作業会社にキャンセルの連絡をする
            //SYNC OPからドレー会社にキャンセルの連絡をする

            if($work) {
                //作業が完了している場合。

                //ドレー会社がSYNC管理ヤードへコンテナを搬入する。

                //ヤードスタッフがデバンニングを行う。（搬入されたコンテナから車両を出してコンテナを空にする）

                //ドレー会社が空になったコンテナを搬出する。
            }

            if($clearance){
                //通関作業が完了している場合。

                //SYNC OPからドレー会社にキャンセル(=コンテナ不要)の連絡をする。
                //SYNC OPから作業会社にキャンセル(=玉出し不要)の連絡をする。
                //SYNC OPから乙仲に再輸入依頼の連絡をする。

                //乙仲が再輸入手続きを行う。

                //乙仲が取止書を発行する。
                
                if($individualJudgment){
                    //各個人の判断で必要であれば取止書をLP3にアップロードする。取止書の分類はEDとする。
                    //@ todo 取止書のアップロード機能を作成する。
                }
            }

            //SYNC OPがJOBの作業確定を解除する
            //@ todo 作業確定の解除機能を作成する。

            if(!$work && !$clearance){
                //通関作業も、作業も、完了していない場合

                // SYNC OPがコンテナJOBの作業スケジュールの変更をする。
                // @todo コンテナJOBの作業スケジュール変更機能を作成する。
            }
        }

        //SYNC OPが作業情報の削除を行う。
        // @todo JOBの削除機能を作成する。
        // @todo JOBの一旦キャンセルの機能を作成する ※本船情報を外すなどの操作で、作業確定が出来ない状態にする

        return false;
    }
}
