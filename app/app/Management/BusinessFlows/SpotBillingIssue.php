<?php

namespace App\Management\BusinessFlows;


/**
 * スポット請求
 */
class SpotBillingIssue extends BusinessFlow
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
        return 'スポット請求';
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
        //(現状)SYNC OPがエクセルで請求書を作成する。

        //SYNC OPがLP3で請求情報を新規作成する。
        // @todo 請求情報の新規作成機能を作成する。

        //SYNC OPが請求情報を編集する。
        // @todo 請求情報の編集機能を作成する。

        //(現状)SYNC OPがエクセルで作成した請求書をアップロードする。
        // @todo 請求書をアップロードする機能を作成する。
        // @todo 請求書のステータスを「未入金」に変更する機能を作成する。
        // @TBC ユーザーが作成したファイルを正式な請求書とすることをありとするかどうか

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
