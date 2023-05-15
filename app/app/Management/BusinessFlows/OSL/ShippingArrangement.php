<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * 船積手配
 */
class ShippingArrangement extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 8;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '船積手配';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '船積作業依頼・書類の作成';
    }

     /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // SYNC OP(OSL)が船積み書類を作成する。INV作成用のエクセルにコピペ

        //SYNC OP(OSL)がIV・SIを作成し・書類をアップロードする。
        // @todo 書類のアップロード機能を作成する。

        // SYNC管理ヤードか否か
        $syncyard = true;

        if($syncyard){
            //SYNC管理ヤードの場合

            //乙仲がLPから書類を取得する。
            // @todo 書類のダウンロード機能を作成

        }
        else{
            //SYNC管理外ヤードの場合

            //SYNC OP(OSL)が乙仲(SHIPSHEET記載)にメールで依頼。(書類等を添付して依頼。)
        }

        //乙仲が書類(DR or SO・ED)を作成する。

        if($syncyard){
             //SYNC管理ヤードの場合

            //乙仲がLPへ書類をアップロード。
            // @todo 書類のダアップロード機能を作成
        }
        else{
            //SYNC管理外ヤードの場合
            //乙仲がSYNC OP(OSL)へ書類を送付する(メール・他)
        }

        return false;
    }

}
