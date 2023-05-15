<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * FREIGHT支払(立替払い)
 */
class FreightPayment extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 11;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'FREIGHT支払い';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'FREIGHT支払(立替払い)';
    }

     /**
     * main
     *
     * @return bool
     */
    public function main(): bool//SYNC OP(OSL)が
    {
        //SYNC OP(OSL)がSHIPSHEETに請求情報を入力
        //SYNC OP(OSL)が請求書をLPにアップロードする。
        // @todo 請求書のアップロード機能を作成する。

        //SYNC OP(OSL)が運賃の立替払いを行う。

        //SYNC OP(OSL)が立替払い完了後、船会社からB/L(原本)を取得する

        //SYNC OP(OSL)がB/L(原本)をLPにアップロードする
        // @todo B/L(原本)のアップロード機能を作成する。

        return false;
    }

}
