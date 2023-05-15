<?php

namespace App\Management\BusinessFlows;


/**
 * 請求(コンテナ)
 */
class ContainerBillingIssue extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 13;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '請求(コンテナ)';
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
        //フレイト請求するかしないか
        $freight = true;

        if ($freight){
            //フレイト請求する場合
            //SYNC OPが該当するコンテナJOBにフレイトを登録する。
            // @todo コンテナJOBでフレイト登録する機能を作成する。
        }
        else{
        }

        //SYNC OPがLP3へ請求情報を登録する。
        // @todo コンテナJOBからACCOUNTING情報を登録する機能を作成する。

        //SYNC OPが請求内容・金額の確認・修正を行う。
        // @todo 請求書の請求内容追加・修正、金額の修正が出来る機能を作成する。

        //SYNC OPが請求書を発行する。
        // @todo 請求書の発行機能を作成する。また、請求書を発行すると請求のステータスが「未入金」になるようにする
        // @todo 請求書のダウンロード機能を作成する。

        //SYNC OPがSHIPPER他取引先へ請求書をメールで送付する。

        //SHIPPER他取引先がSYNC指定口座へ振込みをする。

        //SYNC OPが入金の確認をする。
        // @todo 請求書の情報に入金日の登録が出来る機能を作成する。また、入金日の登録をすると請求のステータスが「入金済」になるようにする

        return false;
    }
}
