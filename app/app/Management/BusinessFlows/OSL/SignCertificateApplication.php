<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * サイン証明申請
 */
class SignCertificateApplication extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 10;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'サイン証明申請';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'サイン証明申請・取得（商工会議所届け出）';
    }

     /**
     * main
     *
     * @return bool
     */
    public function main(): bool//SYNC OP(OSL)が
    {
        //OSL業務依頼元(Shipper)がサイン証明仮申請書を作成する

        //OSL業務依頼元(Shipper)がSHIPSHEETに情報を記載する

        //OSL業務依頼元(Shipper)がサイン証明書をSYNC OP(OSL)に郵送する。

        while(true){
            //SYNC OP(OSL)がサイン証明仮申請書を商工会議所にメールで提出

            //商工会議所が書類を審査する

            //商工会議所が書類を許可
            $permission = true;

            if($permission){
                //商工会議所が書類を許可した場合

                break;
            }
            else{
                //SYNC OP(OSL)が指摘された箇所を修正する
            }

        }

        // SYNC OP(OSL)が許可を受けたサイン証明書を商工会議所へ持ち込む

        //商工会議所がサイン証明を発行する

        //SYNC OP(OSL)がサイン証明(ECトランス with サイン証明)を受領する
        //サイン証明は、ECトランスの書類が翻訳されたことに対する証明。ECトランスに対してサイン証明をつける

        //SYNC OP(OSL)がサイン証明をデジタルデータに変換してLPにアップロードする
        // @todo サイン証明のアップロード機能を作成する。

        return false;
    }
}
