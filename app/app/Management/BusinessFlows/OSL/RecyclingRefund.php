<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * リサイクル還付申請
 */
class RecyclingRefund extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 15;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'リサイクル還付申請';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'リサイクル還付申請';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool//SYNC OP(OSL)が
    {

        //OSL業務依頼元(Shipper)がSYNC OP(OSL)にリサイクル還付手配の指示をする。
        //OSL業務依頼元(Shipper)がSHIPSHEETにリサイクル依頼日を記入

        while (true) {
            //SYNC OP(OSL)がリサイクル還付申請の為、指示を受けた車両の書類を準備する。
            // @todo 車両の書類をダウンロードする機能を作成する。

            //SYNC OP(OSL)がJARCへネット申請する。

            //JARCが申請書類を審査する。

            //合否
            $check = true;
            if ($check) {
                //審査の結果がOKだった場合

                break;
            }
        }

        //JARCがリサイクル還付金をOSL業務依頼元(Shipper)の銀行口座に振り込む

        //OSL業務依頼元(Shipper)が入金を確認する。

        return false;
    }
}
