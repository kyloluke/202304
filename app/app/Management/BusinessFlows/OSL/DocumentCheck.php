<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * ドキュメントチェック
 */
class DocumentCheck extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 12;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ドキュメントチェック';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'ドキュメントチェック';
    }

     /**
     * main
     *
     * @return bool
     */
    public function main(): bool//SYNC OP(OSL)が
    {
        //SYNC OP(OSL)がドキュメントに間違いがないかチェックを行う(S/O・D/R・B/L)

        //訂正があるか
        $corrected = true;

        if($corrected){
            //訂正がある場合

            //SYNC OP(OSL)がLG(保証状)を作成する

            //SYNC OP(OSL)が乙仲 or 船会社　or FORWORDERへLGを提出する

            //乙仲 or 船会社　or FORWORDERが間違った書類の訂正をする。

            //乙仲 or 船会社　or FORWORDERが訂正した書類をLPにアップロードする。
            // @todo 書類のアップロード機能を作成する。
        }
        else{
            //SYNC OP(OSL)が書類をLPにアップロードする。
            // @todo 書類のアップロード機能を作成する。
        }

        return false;
    }

}
